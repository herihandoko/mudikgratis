<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikRuteDataTable;
use App\DataTables\SettingRuteDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikKotaHasRute;
use App\Models\MudikRute;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SettingRuteController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:setting-rute-index|setting-rute-create|setting-rute-edit|setting-rute-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:setting-rute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting-rute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting-rute-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tujuan = MudikTujuan::where('id_period', session('id_period'))->pluck('name', 'id');
        $dataTables = new SettingRuteDataTable($request);
        return $dataTables->render('admin.mudik.settingRuteIndex', compact('tujuan', 'dataTables', 'request'));
    }

    public function create(Request $request)
    {
        $tujuanKota = MudikTujuanKota::find($request->kota_tujuan_id);
        $rute = MudikRute::where('id_period', session('id_period'))->where('is_rute', 1)->pluck('name', 'id');
        return view('admin.mudik.settingRuteCreate', compact('tujuanKota', 'rute', 'request'));
    }

    public function store(Request $request, MudikKotaHasRute $mudikKotaHasRute)
    {
        $rules = [
            'id_rute' => 'required|numeric',
            'sorting' => 'required|numeric'
        ];
        $this->validate($request, $rules);
        $mudikKotaHasRute->id_kota = $request->kota_tujuan_id;
        $mudikKotaHasRute->id_rute = $request->id_rute;
        $mudikKotaHasRute->sorting = $request->sorting;
        $mudikKotaHasRute->id_period = session('id_period');
        $mudikKotaHasRute->created_at = date('Y-m-d H:i:s');
        $mudikKotaHasRute->created_by = auth()->user()->name;
        $mudikKotaHasRute->save();
        $notification = "Tambah setting mudik rute berhasil";
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.setting-rute.index', [
            'tujuan_id' => $request->tujuan_id,
            'kota_tujuan_id' => $request->kota_tujuan_id,
            'search' => 1
        ])->with($notification);
    }

    public function edit($id, Request $request)
    {
        $category = MudikKotaHasRute::findOrFail($id);
        $tujuanKota = MudikTujuanKota::find($request->kota_tujuan_id);
        $rute = MudikRute::where('id_period', session('id_period'))->where('is_rute', 1)->pluck('name', 'id');
        return view('admin.mudik.settingRuteEdit', compact('category', 'tujuanKota', 'rute', 'request'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'id_rute' => 'required|numeric',
            'sorting' => 'required|numeric'
        ];
        $this->validate($request, $rules);
        $mudikKotaHasRute = MudikKotaHasRute::findOrFail($id);
        $mudikKotaHasRute->id_kota = $request->kota_tujuan_id;
        $mudikKotaHasRute->id_rute = $request->id_rute;
        $mudikKotaHasRute->sorting = $request->sorting;
        $mudikKotaHasRute->id_period = session('id_period');
        $mudikKotaHasRute->updated_at = date('Y-m-d H:i:s');
        $mudikKotaHasRute->updated_by = auth()->user()->name;
        $mudikKotaHasRute->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.setting-rute.index', [
            'tujuan_id' => $request->tujuan_id,
            'kota_tujuan_id' => $request->kota_tujuan_id,
            'search' => 1
        ])->with($notification);
    }

    public function destroy($id)
    {
        MudikKotaHasRute::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }

    public function combo(Request $request)
    {
        return MudikTujuanKota::with('tujuan')->where('tujuan_id', $request->id)->get();
    }

    public function show() {}
}
