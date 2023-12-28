<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikVerifikasiDataTable;
use App\Http\Controllers\Controller;
use App\Models\BusKursi;
use App\Models\MudikTujuanKota;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class MudikVerifikasiController extends Controller
{
    //
    public function index(MudikVerifikasiDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.verifikasiIndex');
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

    public function update(Request $request, $id)
    {
        $rules = [
            'status_mudik' => 'required',
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
        $user->nomor_bus = $request->bus_mudik;
        $user->nomor_registrasi = 'MDK-DISHUB-2024' . sprintf("%03d", $user->id);
        if ($user->save() && $request->kursi_peserta) {
            foreach ($request->kursi_peserta as $key => $val) {
                Peserta::where('id', $key)->update([
                    'nomor_bus' => $request->bus_mudik,
                    'nomor_kursi' => $val
                ]);
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
        User::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
