<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use App\Models\User;
use App\Models\UserInactive;
use Illuminate\Http\Request;

class MudikPenggunaController extends Controller
{
    //
    public function index(Request $request)
    {
        $periode = MudikPeriod::where('id', session('id_period'))->pluck('name', 'id');
        $tujuan = MudikTujuan::where('id_period', session('id_period'))->pluck('name', 'id');
        $dataTables = new MudikPenggunaDataTable();
        return $dataTables->render('admin.mudik.penggunaIndex', compact('tujuan', 'request', 'periode'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $pesertas = Peserta::where('user_id', $user->id)->get();
            foreach ($pesertas as $key => $peserta) {
                $dataPeserta = $peserta->toArray();
                unset($dataPeserta['id']);
                $dataPeserta['created_at'] = date('Y-m-d H:i:s', strtotime($dataPeserta['created_at']));
                $dataPeserta['updated_at'] = date('Y-m-d H:i:s');
                $dataPeserta['updated_by'] = auth()->user()->id;
                $dataPeserta['status'] = 'dibatalkan';
                $dataPeserta['reason'] = 'Dibatalkan oleh ' .  auth()->user()->name . ',dengan alasan permintaan pemudik';
                $id = PesertaCancelled::insert($dataPeserta);
                if ($id) {

                    $notifHistory = new NotifHistory();
                    $notifHistory->recipient_number = $user->phone;
                    $notifHistory->message  = "Notifikasi Jawara Mudik, \Peserta Jawara Mudik an:" . $dataPeserta['nama_lengkap'] . " telah berhasil dibatalkan\n\nTerima kasih atas partisipasi Anda dalam mudik gratis\nSalam\nTim Jawara Mudik";
                    $notifHistory->status = 'sent';
                    $notifHistory->created_by = auth()->user()->name;
                    $notifHistory->source = 'send-message';
                    $notifHistory->save();

                    Peserta::where('id', $peserta->id)->delete();
                }
            }
            $dataUser = $user->toArray();
            unset($dataUser['id']);
            unset($dataUser['peserta']);
            $dataUser['email_verified_at'] = date('Y-m-d H:i:s', strtotime($dataUser['email_verified_at']));
            $dataUser['created_at'] = date('Y-m-d H:i:s', strtotime($dataUser['created_at']));
            $dataUser['updated_at'] = date('Y-m-d H:i:s');
            $dataUser['updated_by'] = auth()->user()->id;
            $dataUser['status_mudik'] = 'dibatalkan';
            $dataUser['reason'] = 'Dibatalkan oleh ' .  auth()->user()->name . ',dengan alasan permintaan pemudik';
            $id = UserInactive::insert($dataUser);
            if ($id) {

                $notifHistory = new NotifHistory();
                $notifHistory->recipient_number = $dataUser['phone'];
                $notifHistory->message  = "Notifikasi Jawara Mudik, \nAccount Jawara Mudik an:" . $dataUser['name'] . " telah berhasil dibatalkan\n\nTerima kasih atas partisipasi Anda dalam mudik gratis\nSalam\nTim Jawara Mudik";
                $notifHistory->status = 'sent';
                $notifHistory->created_by = auth()->user()->name;
                $notifHistory->source = 'send-message';
                $notifHistory->save();

                $user->delete();
            }
        }
        // if (User::findOrFail($id)->delete()) {
        //     Peserta::where('user_id', $id)->delete();
        // }
        return response([
            'status' => 'success',
        ]);
    }
}
