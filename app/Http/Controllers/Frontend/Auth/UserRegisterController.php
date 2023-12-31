<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanProvinsi;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\KartuKeluargaRule;
use App\Services\NotificationApiService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::USERPROFILE;
    protected $redirectTo = RouteServiceProvider::USERLOGIN;
    protected $notificationApiService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotificationApiService $notificationApiService)
    {
        $this->middleware('guest');
        $this->notificationApiService = $notificationApiService;
    }

    public function userRegisterForm()
    {
        $tujuan = MudikTujuan::pluck('name', 'id')->prepend('Pilih Tujuan Mudik Gratis', '');
        $cityCode = City::select('code')->where('province_code', 36)->get();
        $tempatLahir = District::whereIn('city_code', $cityCode)->pluck('name', 'name')->prepend('Pilih Tempat Lahir', '');
        $period = MudikPeriod::where('status', 'active')->first();
        $statusMudik = false;
        if ($period)
            $statusMudik = $this->cekStatusAktif($period->start_date, $period->end_date);
        return view('frontend.registerIndex', compact('tujuan', 'tempatLahir', 'statusMudik'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validation = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['unique:users'],
            // 'password' => ['required', 'string', 'min:4', 'confirmed'],
            'no_kk' => ['required', 'string', 'min:16', 'max:16', 'unique:users', new KartuKeluargaRule($data['tujuan'])],
            'nik' => ['required', 'string', 'min:16', 'max:16', 'unique:users'],
            'tujuan' => ['required'],
            'kota_tujuan' => ['required'],
            'jumlah' => ['required'],
            'tgl_lahir' => $data['tujuan'] == 2 ? 'required|date_format:Y-m-d|before:today' : [],
            'tempat_lahir' =>  $data['tujuan'] == 2 ? 'required|max:255' : [],
            'g-recaptcha-response' =>  ReCaptcha('recaptcha_status') == 1 ? ['required', 'captcha'] : [],
        ];

        $customMessages = [
            'required' => 'Data :attribute wajib diisi',
            'unique' => 'Data :attribute sudah ada',
            'email' => 'Data :attribute kurang tepat',
        ];

        return Validator::make($data, $validation, $customMessages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $password = $this->generatePassword();
        $period = MudikPeriod::where('status', 'active')->first();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => null,
            'phone' => $data['phone'],
            'no_kk' => $data['no_kk'],
            'nik' => $data['nik'],
            'tujuan' => $data['tujuan'],
            'kota_tujuan' => $data['kota_tujuan'],
            'jumlah' => $data['jumlah'],
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'pass_code' => $password,
            'periode' => isset($period->tahun) ? $period->tahun : ''
        ]);

        // $template = EmailTemplate::find(3);

        // $body = str_replace('{name}', $user->name, $template->description);
        // $body = str_replace('{website}', GetSetting('site_name'), $body);

        // Mail::send('frontend.emailHtml', ['body' => html_entity_decode($body)], function ($message) use ($user, $template) {
        //     $message->to($user->email);
        //     $message->subject($template->subject);
        // });

        event(new Registered($user));
        $param = [
            'target' => $data['phone'],
            'message' => "[Register Mudik Bersama] - Jawara Mudik \nPendaftaran Anda sebagai peserta mudik bersama Dishub Banten berhasil. \nSilahkan login ke (" . url('login') . ") dengan data sebagai berikut \n\n=========Credentials========== \n\nusername: *" . $data['email'] . "* \npassword: *" . $password . "* \n\n========================== \n\nHarap segera mengganti password Anda setelah melakukan login \n\nTerima kasih"
        ];
        $response = $this->notificationApiService->sendNotification($param);
        if ($response['status']) {
            $usr = User::find($user->id);
            $usr->status_wa = 1;
            $usr->save();
        }
        alert()->success('Pendaftaran Mudik Bersama Berhasil, silahkan login dengan username dan password yang telah dikirim ke no whatsapp Anda!');
        return $user;
    }

    public function userRegisterCities(Request $request)
    {
        return MudikTujuanProvinsi::with('kota')->where('tujuan_id', $request->id)->get();
    }

    function cekStatusAktif($start_date, $end_date)
    {
        // Konversi tanggal ke dalam format timestamp untuk perbandingan
        $start_timestamp = strtotime($start_date);
        $end_timestamp = strtotime($end_date);

        // Ambil timestamp hari ini
        $today_timestamp = strtotime(date('Y-m-d H:i:s'));

        // Periksa apakah hari ini berada di antara start_date dan end_date
        if ($today_timestamp >= $start_timestamp && $today_timestamp <= $end_timestamp) {
            return true;
        } else {
            return false;
        }
    }

    function generatePassword($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
