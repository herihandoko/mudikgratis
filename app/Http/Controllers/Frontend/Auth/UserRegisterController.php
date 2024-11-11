<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanProvinsi;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\EmailRegisterRule;
use App\Rules\KartuKeluargaRule;
use App\Rules\KuotaRule;
use App\Rules\UserKkRule;
use App\Rules\UserNikRule;
use App\Rules\UserPhoneRule;
use App\Services\NotificationApiService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
        if (auth()->check()) {
            return redirect()->intended(RouteServiceProvider::USERPANEL);
        } else {
            $period = MudikPeriod::where('status', 'active')->orderBy('id', 'desc')->first();
            $tujuan = MudikTujuan::where('status', 'active')->where('id_period', $period->id)->pluck('name', 'code')->prepend('Pilih Tujuan Mudik Gratis', '');
            $cityCode = City::select('code')->where('province_code', 36)->get();
            $tempatLahir = District::whereIn('city_code', $cityCode)->pluck('name', 'name')->prepend('Pilih Tempat Lahir', '');
            $statusMudik = false;
            if ($period && $period->status_pendaftaran == 'open') {
                $statusMudik = $this->cekStatusAktif($period->start_date, $period->end_date);
            }
            return view('frontend.registerIndex', compact('tujuan', 'tempatLahir', 'statusMudik', 'period'));
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $period = MudikPeriod::where('status', 'active')->where('status_pendaftaran', 'open')->first();
        $validation = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                new EmailRegisterRule($period->id)
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]{9,15}$/',
                'min:8',
                'max:15',
                new UserPhoneRule($period->id)
            ],
            'no_kk' => [
                'required',
                'string',
                'min:16',
                'max:16',
                new UserKkRule($period->id),
                new KartuKeluargaRule($data['tujuan'])
            ],
            'nik' => [
                'required',
                'string',
                'min:16',
                'max:16',
                new UserNikRule($period->id)
            ],
            'tujuan' => ['required'],
            'kota_tujuan' => ['required'],
            'jumlah' => [
                'required',
                'min:1',
                'max:4',
                new KuotaRule($data['kota_tujuan'], $period->id)
            ],
            'tgl_lahir' => $data['tujuan'] == 'kedalam-banten' ? 'required|date_format:Y-m-d|before:today' : [],
            'tempat_lahir' =>  $data['tujuan'] == 'kedalam-banten' ? 'required|max:255' : [],
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
        $mudikTujuan = MudikTujuan::where('id_period', $period->id)->where('code', $data['tujuan'])->where('status', 'active')->first();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => null,
            'phone' => $data['phone'],
            'no_kk' => $data['no_kk'],
            'nik' => $data['nik'],
            'tujuan' => $mudikTujuan->id,
            'kota_tujuan' => $data['kota_tujuan'],
            'jumlah' => $data['jumlah'],
            'tgl_lahir' => isset($data['tgl_lahir']) ? $data['tgl_lahir'] : null,
            'tempat_lahir' => $data['tempat_lahir'] ? $data['tempat_lahir'] : null,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'pass_code' => $password,
            'periode_id' => isset($period->id) ? $period->id : '',
            'uuid' => (string) Str::uuid()

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
            'message' => "[Register Mudik Bersama] - Jawara Mudik \nPendaftaran Anda sebagai peserta mudik bersama Dishub Banten berhasil. \nSilahkan login ke (" . url('login') . ") dan lengkapi profil Anda sebelum *" . date('d M Y H:i', strtotime('1 hour')) . "* dengan data sebagai berikut \n\n=========Credentials========== \n\nusername: *" . $data['email'] . "* \npassword: *" . $password . "* \n\n========================== \n\nHarap segera mengganti password Anda setelah melakukan login atau klik link berikut: " . route('user.reset') . " \n\nTerima kasih"
        ];
        $response = $this->notificationApiService->sendNotification($param);
        if ($response['status']) {
            $usr = User::find($user->id);
            $usr->status_wa = 1;
            $usr->save();
        }
        alert()->success('Pendaftaran Mudik Bersama Berhasil, silahkan lengkapi profile Anda sebelum ' . date('d M Y H:i', strtotime('1 hour')) . ' dan login dengan username dan password yang telah dikirim ke no whatsapp Anda!');
        return $user;
    }

    public function userRegisterCities(Request $request)
    {
        $period = MudikPeriod::where('status', 'active')->orderBy('id', 'desc')->first();
        $mudikTujuan = MudikTujuan::where('code', $request->id)->where('status', 'active')->where('id_period', $period->id)->first();
        return MudikTujuanProvinsi::with('kota')->where('tujuan_id', $mudikTujuan->id)->where('status', 'active')->get();
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
