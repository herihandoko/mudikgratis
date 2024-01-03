<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\OrderDataTable;
use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Peserta;
use App\Models\User;
use App\Models\UserAdress;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class UserPanelController extends Controller
{
    public  function dashboard()
    {
        $pesertas = Auth::user()->peserta()->latest()->paginate(4);
        $user = Auth::user();
        return view('frontend.ordersIndex', compact('pesertas', 'user'));
    }
    public  function transactions()
    {
        $transactions = Auth::user()->transactions()->latest()->paginate(5);
        return view('frontend.transactionsIndex', compact('transactions'));
    }

    public  function peserta()
    {
        $pesertas = Auth::user()->peserta()->latest()->paginate(4);
        $user = Auth::user();
        return view('frontend.pesertaIndex', compact('pesertas', 'user'));
    }

    public function peserta_eticket($id)
    {
        $pesertas = Auth::user()->peserta()->latest()->paginate(4);
        $user = Auth::user();
        $pdf = FacadePdf::loadView('frontend.pesertaEticket', compact('pesertas', 'user'));
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        return $pdf->download('laporan-pegawai-pdf');
        // return view('frontend.pesertaEticket', compact('pesertas', 'user'));
    }

    public  function peserta_create()
    {
        $user = Auth::user();
        if ($user->peserta->count() >= auth()->user()->jumlah) {
            toast('Jumlah peserta sudah melebihi quota', 'error')->width('300px');
            return redirect()->route('user.peserta');
        }
        return view('frontend.pesertaCreate', compact('user'));
    }

    public  function profile()
    {
        $user = Auth::user();
        return view('frontend.profileIndex', compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $attributes = [
            'name' => 'required',
            'no_kk' => 'required|min:16|max:24',
            'nik' => 'required|min:16|max:24',
            'tgl_lahir' => 'required|date_format:Y-m-d|before:today',
            'tempat_lahir' => 'required|max:255',
            'gender' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required|integer',
            // 'post_code' => 'required',
            'address' => 'required',
            'provinsi' => 'required|integer',
            'kecamatan' => 'required|integer',
            'kelurahan' => 'required|integer',
            'is_peserta' => 'required'
        ];
        if ($request->hasFile('foto_ktp')) {
            $attributes['foto_ktp'] = 'required|max:5000|mimes:jpg,jpeg,png,JPG,JPEG,PNG';
        }
        if ($request->hasFile('foto_kk')) {
            $attributes['foto_kk'] = 'required|max:5000|mimes:jpg,jpeg,png,JPG,JPEG,PNG';
        }
        if ($request->hasFile('foto_selfie')) {
            $attributes['foto_selfie'] = 'required|max:5000|mimes:jpg,jpeg,png,JPG,JPEG,PNG';
        }

        $validator = Validator::make($request->all(), $attributes);

        if ($validator->fails()) {
            if ($validator->errors()->has('no_kk')) {
                toast(trans('frontend.KK required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('name')) {
                toast(trans('frontend.Name required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('phone')) {
                toast(trans('frontend.Phone required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('country')) {
                toast(trans('frontend.Country required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('tgl_lahir')) {
                toast(trans('frontend.tgl_lahir required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('tempat_lahir')) {
                toast('Tempat lahir harus diisi', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('city')) {
                toast(trans('frontend.City required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            // if ($validator->errors()->has('post_code')) {
            //     toast(trans('frontend.Post code required!'), 'error')->width('300px');
            //     return redirect()->back()->withInput();
            // }
            if ($validator->errors()->has('address')) {
                toast(trans('frontend.Address required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('foto_ktp')) {
                toast($validator->messages()->get('foto_ktp')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('foto_kk')) {
                toast($validator->messages()->get('foto_kk')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('foto_selfie')) {
                toast($validator->messages()->get('foto_selfie')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }

        if (strlen($request->password) > 0) {
            if (strlen($request->password) < 4) {
                toast(trans('frontend.Password must be min 4 charecters!'), 'error')->width('350px');
                return redirect()->back()->withInput();
            }

            $user->password = bcrypt($request->password);
            $user->pass_code = $request->password;
            $user->save();

            toast(trans('frontend.Password changed successfully!'), 'success')->width('350px');
            return redirect()->back()->withInput();
        }

        if ($request->hasFile('avatar')) {

            if (File::exists(public_path("$user->avatar"))) {
                File::delete(public_path("$user->avatar"));
            }

            // Upload Avatar
            $image = $request->file('avatar');
            $name = 'media_' . time();
            $avatar_folder = 'assets/uploads/user/avatar/';

            if (!File::isDirectory(public_path($avatar_folder))) {
                File::makeDirectory(public_path($avatar_folder), 0777, true, true);
            }

            $avatar_path = $avatar_folder . $name . '.' . $image->getClientOriginalExtension();

            //Resize Avatar
            $avatar = Image::make($image);
            $avatar->fit(400, 400);
            $avatar->save(public_path($avatar_path));
            // Insert Data
            $user->avatar = $avatar_path;
        }

        if ($request->hasFile('foto_kk')) {

            if (File::exists(public_path("$user->foto_kk"))) {
                File::delete(public_path("$user->foto_kk"));
            }

            // Upload Avatar
            $image = $request->file('foto_kk');
            $name = 'media_kk_' . $user->id . '_' . time();
            $avatar_folder = 'assets/uploads/user/document/';

            if (!File::isDirectory(public_path($avatar_folder))) {
                File::makeDirectory(public_path($avatar_folder), 0777, true, true);
            }

            $avatar_path = $avatar_folder . $name . '.' . $image->getClientOriginalExtension();

            //Resize Avatar
            $avatar = Image::make($image);
            // $avatar->fit(400, 400);
            $avatar->save(public_path($avatar_path));
            // Insert Data
            $user->foto_kk = $avatar_path;
        }

        if ($request->hasFile('foto_ktp')) {

            if (File::exists(public_path("$user->foto_ktp"))) {
                File::delete(public_path("$user->foto_ktp"));
            }

            // Upload Avatar
            $image = $request->file('foto_ktp');
            $name = 'media_ktp_' . $user->id . '_' . time();
            $avatar_folder = 'assets/uploads/user/document/';

            if (!File::isDirectory(public_path($avatar_folder))) {
                File::makeDirectory(public_path($avatar_folder), 0777, true, true);
            }

            $avatar_path = $avatar_folder . $name . '.' . $image->getClientOriginalExtension();

            //Resize Avatar
            $avatar = Image::make($image);
            // $avatar->fit(400, 400);
            $avatar->save(public_path($avatar_path));
            // Insert Data
            $user->foto_ktp = $avatar_path;
        }

        if ($request->hasFile('foto_selfie')) {

            if (File::exists(public_path("$user->foto_selfie"))) {
                File::delete(public_path("$user->foto_selfie"));
            }

            // Upload Avatar
            $image = $request->file('foto_selfie');
            $name = 'media_selfie_' . $user->id . '_' . time();
            $avatar_folder = 'assets/uploads/user/document/';

            if (!File::isDirectory(public_path($avatar_folder))) {
                File::makeDirectory(public_path($avatar_folder), 0777, true, true);
            }

            $avatar_path = $avatar_folder . $name . '.' . $image->getClientOriginalExtension();

            //Resize Avatar
            $avatar = Image::make($image);
            // $avatar->fit(400, 400);
            $avatar->save(public_path($avatar_path));
            // Insert Data
            $user->foto_selfie = $avatar_path;
        }

        $user->status_profile = 1;
        $user->is_peserta = $request->is_peserta ?: $user->is_peserta;
        $user->name = $request->name ?: $user->name;
        $user->phone = $request->phone ?: $user->phone;
        $user->no_kk = $request->no_kk ?: $user->no_kk;
        $user->nik = $request->nik ?: $user->nik;
        $user->gender = $request->gender ?: $user->gender;
        $user->tgl_lahir = $request->tgl_lahir ?: $user->tgl_lahir;
        $user->tempat_lahir = $request->tempat_lahir ?: $user->tempat_lahir;

        $user->save();
        if ($request->is_peserta == 'Ya') {
            $peserta = new Peserta();
            $dataPeserta = $peserta->where('nik', $request->nik)->exists();
            if ($dataPeserta)
                $peserta->where('nik', $request->nik)->delete();
            $peserta->nama_lengkap =  $request->name ?: $user->name;
            $peserta->nik = $request->nik ?: $user->nik;
            $peserta->tgl_lahir = $request->tgl_lahir ?: $user->tgl_lahir;
            $peserta->jenis_kelamin = $request->gender ?: $user->gender;
            $peserta->user_id = $user->id;
            $peserta->created_at = date('Y-m-d H:i:s');
            $peserta->kategori = $this->categorizeAgeGroup($request->tgl_lahir);
            $peserta->kota_tujuan_id = $user->kota_tujuan;
            $peserta->periode_id = $user->periode_id;
            $peserta->save();
        } else {
            Peserta::where('nik', $request->nik)->delete();
        }

        if (!UserAdress::where(['user_id' => $user->id])->first()) $address = new UserAdress();
        else $address = UserAdress::where(['user_id' => $user->id])->first();
        $address->user_id = $user->id;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->post_code = $request->post_code;
        $address->address = $request->address;

        $address->provinsi = $request->provinsi;
        $address->kecamatan = $request->kecamatan;
        $address->kelurahan = $request->kelurahan;

        $address->save();

        toast(trans('frontend.Profile Updated!'), 'success')->width('350px');

        return redirect()->back();
    }

    public function shipping_address(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('country')) {
                toast(trans('frontend.Country required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('city')) {
                toast(trans('frontend.City required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('post_code')) {
                toast(trans('frontend.Post code required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($validator->errors()->has('address')) {
                toast(trans('frontend.Address required!'), 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }


        $user = User::find(Auth::user()->id);
        $user->name = $request->name ?: $user->name;
        $user->phone = $request->phone ?: $user->phone;
        $user->save();
        if (!UserAdress::where(['user_id' => $user->id])->first()) $address = new UserAdress();
        else $address = UserAdress::where(['user_id' => $user->id])->first();
        $address->user_id = $user->id;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->post_code = $request->post_code;
        $address->address = $request->address;
        $address->save();
        toast(trans('frontend.Address Updated!'), 'success')->width('300px');
        return redirect()->back();
    }

    function categorizeAgeGroup($birthdate)
    {
        $today = new DateTime();
        $birthDate = new DateTime($birthdate);
        $age = $today->diff($birthDate)->y;

        if ($age >= 18) {
            return "Dewasa"; // Adult
        } elseif ($age >= 5 && $age < 18) {
            return "Anak";   // Child
        } elseif ($age >= 0 && $age < 5) {
            return "Balita"; // Toddler
        } else {
            return "Usia tidak valid";
        }
    }

    public function peserta_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nik' => 'required|min:16|max:24|unique:pesertas,nik',
            'tgl_lahir' => 'required|date_format:Y-m-d|before:today',
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('nama_lengkap')) {
                toast('Nama Lengkap Tidak Boleh Kosong', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('nik')) {
                toast('NIK salah/NIK Sudah terdaftar', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('tgl_lahir')) {
                toast('Format Tanggal Lahir Salah', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('jenis_kelamin')) {
                toast('Jenis Kelamin Tidak Boleh Kosong', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }

        $peserta = new Peserta();
        $peserta->nama_lengkap =  $request->nama_lengkap ?: $peserta->name;
        $peserta->nik = $request->nik ?: $peserta->nik;
        $peserta->tgl_lahir = $request->tgl_lahir ?: $peserta->tgl_lahir;
        $peserta->jenis_kelamin = $request->jenis_kelamin ?: $peserta->jenis_kelamin;
        $peserta->user_id = Auth::user()->id;
        $peserta->created_at = date('Y-m-d H:i:s');
        $peserta->kategori = $this->categorizeAgeGroup($request->tgl_lahir);
        $peserta->kota_tujuan_id = Auth::user()->kota_tujuan;
        $peserta->periode_id = Auth::user()->periode_id;
        if ($peserta->save()) {
            $user = User::find(auth()->user()->id);
            $user->status_mudik = 'waiting';
            $user->save();
        }
        toast('Tambah peserta berhasil', 'success')->width('350px');
        return redirect()->route('user.peserta');
    }

    public  function peserta_edit($id)
    {
        $user = Auth::user();
        $peserta = Peserta::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$peserta) {
            toast('Data tidak ditemukan', 'error')->width('400px');
            return redirect()->route('user.peserta');
        }
        return view('frontend.pesertaEdit', compact('user', 'peserta'));
    }

    public function peserta_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nik' => 'required|min:16|max:24|unique:pesertas,nik,' . $request->id,
            'tgl_lahir' => 'required|date_format:Y-m-d|before:today',
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('nama_lengkap')) {
                toast('Nama Lengkap Tidak Boleh Kosong', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('nik')) {
                toast('NIK salah/NIK Sudah terdaftar', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('tgl_lahir')) {
                toast('Format Tanggal Lahir Salah', 'error')->width('300px');
                return redirect()->back()->withInput();
            }

            if ($validator->errors()->has('jenis_kelamin')) {
                toast('Jenis Kelamin Tidak Boleh Kosong', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }

        $jmlPeserta = Peserta::where('user_id', Auth::user()->id)->count();
        if ($jmlPeserta > 4) {
            toast('Jumlah peserta sudah melebihi quota', 'error')->width('300px');
            return redirect()->back()->withInput();
        }

        $peserta = Peserta::find($request->id);
        $peserta->nama_lengkap =  $request->nama_lengkap ?: $peserta->name;
        $peserta->nik = $request->nik ?: $peserta->nik;
        $peserta->tgl_lahir = $request->tgl_lahir ?: $peserta->tgl_lahir;
        $peserta->jenis_kelamin = $request->jenis_kelamin ?: $peserta->jenis_kelamin;
        $peserta->user_id = Auth::user()->id;
        $peserta->created_at = date('Y-m-d H:i:s');
        $peserta->kategori = $this->categorizeAgeGroup($request->tgl_lahir);
        $peserta->kota_tujuan_id = Auth::user()->kota_tujuan;
        $peserta->periode_id = Auth::user()->periode_id;
        $peserta->save();
        toast('Tambah peserta berhasil', 'success')->width('350px');
        return redirect()->route('user.peserta');
    }

    public function peserta_delete(Request $request)
    {
        Peserta::where('id', $request->uid)->where('user_id', Auth::user()->id)->delete();
        toast('Hapus peserta berhasil', 'success')->width('350px');
        return redirect()->route('user.peserta');
    }

    public function delete()
    {
        $user = User::find(auth()->user()->id);
        $dataUser = $user->toArray();
        if ($dataUser) {
            unset($dataUser['id']);
            $dataUser['email_verified_at'] = date('Y-m-d H:i:s', strtotime($dataUser['email_verified_at']));
            $dataUser['created_at'] = date('Y-m-d H:i:s', strtotime($dataUser['created_at']));
            $dataUser['updated_at'] = date('Y-m-d H:i:s', strtotime($dataUser['updated_at']));
            $id = UserInactive::insert($dataUser);
            if ($id) {
                User::where('id', auth()->user()->id)->delete();
            }
        }
        return response([
            'status' => 'success',
        ]);
    }

    public function peserta_cancel(Request $request)
    {
        $user = Auth::user();
        return view('frontend.pesertaCancel', compact('user'));
    }

    public function store_cancel(Request $request, NotificationApiService $notificationService)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:16|max:24'
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->has('nik')) {
                toast('NIK atau Nomor KTP tidak sesuai', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }

        $user = User::where('nik', $request->nik)->where('id', auth()->user()->id)->first();
        if ($user) {
            $dataUser = $user->toArray();
            if ($dataUser) {
                unset($dataUser['id']);
                $dataUser['email_verified_at'] = date('Y-m-d H:i:s', strtotime($dataUser['email_verified_at']));
                $dataUser['created_at'] = date('Y-m-d H:i:s', strtotime($dataUser['created_at']));
                $dataUser['updated_at'] = date('Y-m-d H:i:s', strtotime($dataUser['updated_at']));
                $id = UserInactive::insert($dataUser);
                if ($id) {
                    $param = [
                        'target' => $user->phone,
                        'message' => "[Pembatalan Mudik] - Jawara Mudik \nPembatalan dan Penghapusan Peserta Jawara Mudik DISHUB Propinsi Banten berhasil. \n\nTerima kasih"
                    ];
                    $notificationService->sendNotification($param);
                    User::where('id', auth()->user()->id)->delete();
                    return redirect()->route('home');
                }
            }
        } else {
            toast('NIK atau Nomor KTP tidak sesuai', 'error')->width('300px');
            return redirect()->back()->withInput();
        }
    }
}
