<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikKotaDataTable;
use App\DataTables\MudikProvinsiDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\MudikTujuanKotaHasBus;
use App\Models\MudikTujuanProvinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MudikKotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mudik-kota-index|mudik-kota-create|mudik-kota-edit|mudik-kota-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-kota-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-kota-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-kota-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tujuan = MudikTujuan::pluck('name', 'id');
        $dataTables = new MudikKotaDataTable();
        return $dataTables->render('admin.mudik.kotaIndex', compact('tujuan', 'request'));
    }

    public function create()
    {
        $tujuan = MudikTujuan::pluck('name', 'id');
        $bus = Bus::where('status', 'active')->pluck('name', 'id');
        return view('admin.mudik.kotaCreate', compact('tujuan', 'bus'));
    }

    public function provinsi(Request $request)
    {
        return MudikTujuanProvinsi::where('tujuan_id', $request->id)->get();
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'tujuan_id' => 'required|numeric',
            'provinsi_id' => 'required|numeric',
            'titik_awal' => 'required|max:1000',
            'titik_akhir' => 'required|max:1000',
            'tgl_keberangkatan' => 'required|date_format:Y-m-d\TH:i',
            'bus_id'    => "required|array",
            'bus_id.*'  => "required|string|distinct"
        ];
        $this->validate($request, $rules);
        $provinsi = new MudikTujuanKota();
        $provinsi->name = $request->name;
        $provinsi->tujuan_id = $request->tujuan_id;
        $provinsi->provinsi_id = $request->provinsi_id;
        $provinsi->status = isset($request->status) ? 'active' : 'inactive';
        $provinsi->tgl_keberangkatan = Carbon::parse($request->tgl_keberangkatan)->format('Y-m-d\TH:i');
        $provinsi->titik_awal = $request->titik_awal;
        $provinsi->titik_akhir = $request->titik_akhir;
        $provinsi->save();
        $listBus = $request->bus_id;
        if ($listBus) {
            $dataBus = [];
            foreach ($listBus as $key => $value) {
                $dataBus[] = [
                    'kota_tujuan' => $provinsi->id,
                    'bus_id' => $value,
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
            if ($dataBus)
                MudikTujuanKotaHasBus::insert($dataBus);
        }
        $notification = trans('admin.Create Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-kota.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikTujuanKota::findOrFail($id);
        $tujuan = MudikTujuan::pluck('name', 'id');
        $bus = Bus::where('status', 'active')->pluck('name', 'id');
        $valueBus = MudikTujuanKotaHasBus::select('bus_id')->where('kota_tujuan', $id)->pluck('bus_id');
        return view('admin.mudik.kotaEdit', compact('category', 'tujuan', 'bus', 'valueBus'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'tujuan_id' => 'required|numeric',
            'provinsi_id' => 'required|numeric',
            'titik_awal' => 'required|max:1000',
            'titik_akhir' => 'required|max:1000',
            'tgl_keberangkatan' => 'required|date_format:Y-m-d\TH:i',
            'bus_id'    => "required|array",
            'bus_id.*'  => "required|string|distinct"
        ];
        $this->validate($request, $rules);
        $provinsi = MudikTujuanKota::findOrFail($id);
        $provinsi->name = $request->name;
        $provinsi->tujuan_id = $request->tujuan_id;
        $provinsi->provinsi_id = $request->provinsi_id;
        $provinsi->status = isset($request->status) ? 'active' : 'inactive';
        $provinsi->tgl_keberangkatan = Carbon::parse($request->tgl_keberangkatan)->format('Y-m-d\TH:i');
        $provinsi->titik_awal = $request->titik_awal;
        $provinsi->titik_akhir = $request->titik_akhir;
        $provinsi->save();
        $listBus = $request->bus_id;
        if ($listBus) {
            MudikTujuanKotaHasBus::where('kota_tujuan', $id)->delete();
            $dataBus = [];
            foreach ($listBus as $key => $value) {
                $dataBus[] = [
                    'kota_tujuan' => $id,
                    'bus_id' => $value,
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
            if ($dataBus)
                MudikTujuanKotaHasBus::insert($dataBus);
        }
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-kota.index')->with($notification);
    }

    public function destroy($id)
    {
        MudikTujuanKota::findOrFail($id)->delete();
        MudikTujuanKotaHasBus::where('kota_tujuan', $id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
