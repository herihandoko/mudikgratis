<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikPesertaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesertaStoreRequest;
use App\Models\MudikKotaHasStop;
use App\Models\MudikRute;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\Peserta;
use App\Models\Profession;
use App\Models\User;
use App\Models\UserAdress;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MudikPesertaController extends Controller
{
    //
    public function index(MudikPesertaDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.verifikasiIndex');
    }

    public function create()
    {
        $tujuanIds = User::select('tujuan')->where('nomor_registrasi', 'spare-system')->where('jumlah', '>', 0)->where('periode_id', session('id_period'))->get();
        $tujuan = MudikTujuan::whereIn('id', $tujuanIds)->where('id_period', session('id_period'))->pluck('name', 'id');
        $profession = Profession::pluck('name', 'id');
        $kotaTujuan = MudikTujuanKota::get();
        return view('admin.mudik.pesertaCreate', compact('tujuan', 'profession', 'kotaTujuan'));
    }

    public function combo(Request $request)
    {
        $kotaIds = User::select('kota_tujuan')->where('tujuan', $request->id)->where('nomor_registrasi', 'spare-system')->where('jumlah', '>', 0)->where('periode_id', session('id_period'))->get();
        return MudikTujuanKota::with('tujuan')->where('tujuan_id', $request->id)->whereIn('id', $kotaIds)->get();
    }

    public function pickstop(Request $request)
    {
        $idKotaTujuan = $request->id;
        $idRutes = MudikKotaHasStop::select('id_rute')->where('id_kota', $idKotaTujuan)->get();
        $kuota = User::select('jumlah')->where('kota_tujuan', $request->id)->where('nomor_registrasi', 'spare-system')->where('jumlah', '>', 0)->where('periode_id', session('id_period'))->first();
        return response([
            'success' => true,
            'stoppoint' => MudikRute::whereIn('id', $idRutes)->get(),
            'kuota' => $kuota
        ]);
    }

    public function store(PesertaStoreRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $password = $this->generatePassword();


        $ttlAnggota = 0;
        foreach ($request->anggota as $key => $value) {
            if ($value['nik'] && $value['nama'] && $value['tanggal_lahir'] && $value['gender']) {
                $ttlAnggota++;
            }
        }
        $ttlAnggota = (int)$ttlAnggota;
        $jumlahRequest = (int)$request->jumlah;
        $spareKuota = User::select('id', 'jumlah')->where('nomor_registrasi', 'spare-system')->where('tujuan', $request->tujuan_id)->where('kota_tujuan', $request->kota_tujuan_id)->where('periode_id', session('id_period'))->first();
        $kuotaTersedia = 0;
        if ($spareKuota) {
            $kuotaTersedia = (int)$spareKuota->jumlah;
            if ($jumlahRequest  > $kuotaTersedia) {
                toast('Kuota tidak cukup', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($ttlAnggota > $kuotaTersedia) {
                toast('Jumlah anggota tidak cukup', 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        } else {
            toast('Tidak ada kuota tersedia', 'error')->width('300px');
            return redirect()->back()->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => null,
            'phone' => $request->phone,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'tujuan' => $request->tujuan_id,
            'kota_tujuan' => $request->kota_tujuan_id,
            'jumlah' => $request->jumlah,
            'tgl_lahir' => isset($request->tgl_lahir) ? $request->tgl_lahir : null,
            'tempat_lahir' => isset($request->tempat_lahir) ? $request->tempat_lahir : null,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'pass_code' => $password,
            'periode_id' => session('id_period'),
            'uuid' => (string) Str::uuid(),
            'status_profile' => 1,
            'avatar' => 'assets/frontend/images/user.png',
            'foto_kk' => 'assets/frontend/images/familycard.png',
            'foto_ktp' => 'assets/frontend/images/idcard.png',
            'foto_selfie' => 'assets/frontend/images/user.png',
            'is_peserta' => 'Ya',
            'status_mudik' => 'dikirim',
            'id_rute' => $request->id_rute,
            'gender' => $request->gender,
            'id_profession' => $request->id_profession

        ]);
        if ($user) {
            $quotaSpareSystem = 0;
            if ($kuotaTersedia == $jumlahRequest) {
                $quotaSpareSystem = 0;
                User::where('id', $spareKuota->id)->where('nomor_registrasi', 'spare-system')->delete();
            } else {
                $quotaSpareSystem = $kuotaTersedia - $jumlahRequest;
                User::where('id', $spareKuota->id)->where('nomor_registrasi', 'spare-system')->update([
                    'jumlah' => $quotaSpareSystem
                ]);
            }

            MudikTujuanKota::where('id', $request->kota_tujuan_id)->update([
                'quota_spare_system' => $quotaSpareSystem
            ]);

            $address = new UserAdress();
            $address->user_id = $user->id;
            $address->city = $request->city;
            $address->post_code = $request->post_code;
            $address->address = $request->address;

            $address->provinsi = $request->provinsi;
            $address->kecamatan = $request->kecamatan;
            $address->kelurahan = $request->kelurahan;

            $address->save();
            if ($request->anggota) {
                foreach ($request->anggota as $key => $value) {
                    if ($value['nik'] && $value['nama'] && $value['tanggal_lahir'] && $value['gender']) {
                        $peserta = new Peserta();
                        $peserta->nama_lengkap =  $value['nama'];
                        $peserta->nik = $value['nik'];
                        $peserta->tgl_lahir = $value['tanggal_lahir'];
                        $peserta->jenis_kelamin = $value['gender'];
                        $peserta->user_id = $user->id;
                        $peserta->created_at = date('Y-m-d H:i:s');
                        $peserta->kategori = $this->categorizeAgeGroup($value['tanggal_lahir']);
                        $peserta->kota_tujuan_id = $request->kota_tujuan_id;
                        $peserta->periode_id = session('id_period');
                        $peserta->status = 'dikirim';
                        $peserta->save();
                    }
                }
            }
        }
        $notification =  'Tambah peserta mudik berhasil.';
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-verifikasi.index', ['tujuan_id' => $request->tujuan_id, 'kota_tujuan_id' => $request->kota_tujuan_id, 'status_mudik' => 'dikirim'])->with($notification);
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
}
