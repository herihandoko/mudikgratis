<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikVerifikasiDataTable;
use App\Http\Controllers\Controller;
use App\Models\BusKursi;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\Peserta;
use App\Models\PesertaRejected;
use App\Models\User;
use App\Services\NotificationApiService;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class MudikVerifikasiController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mudik-verifikasi-index|mudik-verifikasi-create|mudik-verifikasi-edit|mudik-verifikasi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-verifikasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-verifikasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-verifikasi-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tujuan = MudikTujuan::pluck('name', 'id');
        $dataTables = new MudikVerifikasiDataTable();
        return $dataTables->render('admin.mudik.verifikasiIndex', compact('tujuan', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->where('status_profile', 1)->first();
        $kotatujuan = MudikTujuanKota::find($user->kota_tujuan);
        $kursi = BusKursi::where('type_kursi', '2-2')->get();
        return view('admin.mudik.verifikasiEdit', compact('user', 'kotatujuan', 'kursi'));
    }

    public function update(Request $request, $id, NotificationApiService $notificationApiService)
    {
        $rules = [
            'status_mudik' => 'required',
            'reason' => 'required_if:status_mudik,==,ditolak',
            'bus_mudik' => 'required_if:status_mudik,==,diterima',
            'kursi_peserta' => 'required_if:status_mudik,==,diterima',
            'kursi_peserta.*' => 'required_if:status_mudik,==,diterima',
        ];

        $customMessages = [
            'status_mudik.required' => 'Status peserta mudik harus dipilih',
            'bus_mudik.required' => 'Bus peserta mudik harus dipilih'
        ];
        $this->validate($request, $rules, $customMessages);
        $user =  User::findOrFail($id);
        $user->status_mudik = $request->status_mudik;
        if ($request->status_mudik == 'diterima') {
            $user->nomor_bus = $request->bus_mudik;
            $nomorRegistrasi = 'MDK-DISHUB-' . date('Y') . sprintf("%03d", $user->id);
            $user->nomor_registrasi = $nomorRegistrasi;
            if ($user->save() && $request->kursi_peserta) {
                foreach ($request->kursi_peserta as $key => $val) {
                    Peserta::where('id', $key)->update([
                        'nomor_bus' => $request->bus_mudik,
                        'status' => $request->status_mudik,
                        'nomor_kursi' => $val
                    ]);
                }
                $tujuan = MudikTujuan::find($user->tujuan);
                if ($tujuan->code == 'kedalam-banten') {
                    $message = "[Status Mudik Bersama Diterima] - Jawara Mudik \Selamat!, Data peserta mudik Anda sudah tersimpan dengan Nomor Registrasi *" . $nomorRegistrasi . "*.\nPeserta Mudik yang di nyatakan terdaftar wajib hadir pada saat Verifikasi Waktu dan Tempat untuk Verifikasi sebagai berikut:\n\n============================= \n\nTanggal: *22 - 23 Maret 2024*\nWaktu:*09.00 WIB s/d 17.00 WIB*\nTempat:*Akan di Informasikan lebih lanjut*\n\n============================= \n\nTerima kasih";
                } else {
                    $message = "[Status Mudik Bersama Diterima] - Jawara Mudik \Selamat!, Data peserta mudik Anda sudah tersimpan dengan Nomor Registrasi *" . $nomorRegistrasi . "*.\nPeserta Mudik yang di nyatakan terdaftar wajib hadir pada saat Verifikasi Waktu dan Tempat untuk Verifikasi sebagai berikut:\n\n============================= \n\nTanggal: *22 - 23 Maret 2024*\nWaktu:*09.00 WIB s/d 17.00 WIB*\nTempat:*Kantor Dinas Perhubungan Provinsi Banten KP3B - Palima Kota Serang*\n\n============================= \n\nTerima kasih";
                }
                $param = [
                    'target' => $user->phone,
                    'message' => $message
                ];
                $notificationApiService->sendNotification($param);
            }
        } else {
            $user->reason = $request->reason;
            $user->nomor_bus = null;
            $param = [
                'target' => $user->phone,
                'message' => "[Status Mudik Bersama Ditolak] - Jawara Mudik \nMaaf, Status Pendaftaran sebagai peserta mudik bersama Dishub Banten ditolak, dikarenakan: \n\n" . $request->reason . " \n\nTerima kasih"
            ];
            $notificationApiService->sendNotification($param);
            if ($user->save()) {
                $pesertas = Peserta::where('user_id', $user->id)->get();
                foreach ($pesertas as $key => $value) {
                    $peserta = new PesertaRejected();
                    $peserta->nama_lengkap =  $value->nama_lengkap;
                    $peserta->nik = $value->nik;
                    $peserta->tgl_lahir = $value->tgl_lahir;
                    $peserta->jenis_kelamin = $value->jenis_kelamin;
                    $peserta->user_id = $value->user_id;
                    $peserta->created_at = date('Y-m-d H:i:s');
                    $peserta->kategori = $value->kategori;
                    $peserta->kota_tujuan_id = $value->kota_tujuan_id;
                    $peserta->periode_id = $value->periode_id;
                    $peserta->status = $request->status_mudik;
                    $peserta->reason = $request->reason;
                    $peserta->save();
                }
                // Peserta::where('user_id', $user->id)->delete();
            }
        }
        $notification = 'Verifikasi Peserta Mudik Berhasil';
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-verifikasi.index', ['tujuan_id' => $user->tujuan, 'kota_tujuan_id' => $user->kota_tujuan])->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }

    public function seat(Request $request)
    {
        $idbus = $request->idbus;
        $pesertas = Peserta::select('nomor_kursi')->where('nomor_bus', $idbus)->get();
        $kursi = [];
        foreach ($pesertas as $key => $value) {
            $kursi[$value->nomor_kursi] = $value->nomor_kursi;
        }
        return view('admin.mudik.indexSeat', compact('request', 'kursi'));
    }

    public function seat_store(Request $request)
    {
        $peserta = Peserta::find($request->idpeserta);
        if ($request->idbus && $request->seat && $request->idpeserta) {
            $checkAvailable = Peserta::where('nomor_bus', $request->idbus)->where('nomor_kursi', $request->seat)->where('id', '!=', $request->idpeserta)->exists();
            if (!$checkAvailable) {
                $peserta->nomor_bus = $request->idbus;
                $peserta->nomor_kursi = $request->seat;
                $peserta->save();
                return response([
                    'status' => 'success',
                    'message' => "Kursi berhasil dipilih",
                    'url' => route('admin.mudik-verifikasi.edit', $peserta->user_id)
                ]);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => "Kursi sudah terisi"
                ]);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => "Gagal pilih kursi"
            ]);
        }
    }

    public function bus_store(Request $request)
    {
        $user = User::find($request->iduser);
        $user->nomor_bus = $request->idbus;
        if ($user->save()) {
            Peserta::where('user_id', $request->iduser)->update([
                'nomor_bus' => null,
                'nomor_kursi' => null
            ]);
        }
        return response([
            'status' => 'success'
        ]);
    }

    public function combo(Request $request)
    {
        return MudikTujuanKota::where('tujuan_id', $request->id)->get();
    }

    public function cetak($id)
    {
        $pesertas = Peserta::where('user_id', $id)->get();
        $user = User::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->generate($user->nomor_registrasi));
        $pdf = Pdf::loadView('frontend.pesertaEticket', compact('pesertas', 'user', 'qrcode'));
        return $pdf->download('tiket-mudik-bersama.pdf');
    }
}
