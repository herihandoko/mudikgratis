<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikPesertaDataTable;
use App\DataTables\MudikProvinsiDataTable;
use App\DataTables\MudikVerifikasiDataTable;
use App\Exports\ExportPeserta;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusKursi;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\Peserta;
use App\Models\PesertaRejected;
use App\Models\User;
use App\Services\NotificationApiService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MudikReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mudik-report-index|mudik-report-create|mudik-report-edit|mudik-report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-report-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $periode = MudikPeriod::pluck('name', 'id');
        $tujuan = MudikTujuan::pluck('name', 'id');
        $dataTables = new MudikPesertaDataTable();
        if ($request->type == 'export') {
            $bus = Bus::find($request->nomor_bus);
            $kotaTujuan = MudikTujuanKota::find($request->kota_tujuan_id);
            return Excel::download(new ExportPeserta($request, $bus, $kotaTujuan), 'report-peserta-mudik.xlsx');
        }
        return $dataTables->render('admin.mudik.reportIndex', compact('tujuan', 'request', 'periode'));
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
                        'nomor_kursi' => $val
                    ]);
                }
                $param = [
                    'target' => $user->phone,
                    'message' => "[Status Mudik Bersama Diterima] - Jawara Mudik \Selamat!, Data peserta mudik Anda sudah tersimpan dengan Nomor Registrasi *" . $nomorRegistrasi . "*.\nSilahkan download E-Tiket Anda di " . url('login') . " & Perlihatkan kepada petugas kami pada saat registrasi ulang.  \n\nTerima kasih"
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
                    $peserta->save();
                }
                Peserta::where('user_id', $user->id)->delete();
            }
        }
        $notification = 'Verifikasi Peserta Mudik Berhasil';
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-verifikasi.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peserta::findOrFail($id)->delete();
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

    public function combobus(Request $request)
    {
        $kota = MudikTujuanKota::where('id', $request->id)->first();
        return $kota->bus;
    }
}
