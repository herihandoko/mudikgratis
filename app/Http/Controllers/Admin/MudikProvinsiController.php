<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikProvinsiDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\MudikTujuanProvinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MudikProvinsiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mudik-provinsi-index|mudik-provinsi-create|mudik-provinsi-edit|mudik-provinsi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-provinsi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-provinsi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-provinsi-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tujuan = MudikTujuan::pluck('name', 'id');
        $dataTables = new MudikProvinsiDataTable();
        return $dataTables->render('admin.mudik.provinsiIndex', compact('tujuan', 'request'));
    }

    public function create()
    {
        $tujuan = MudikTujuan::pluck('name', 'id');
        return view('admin.mudik.provinsiCreate', compact('tujuan'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255'
        ];
        $this->validate($request, $rules);
        $provinsi = new MudikTujuanProvinsi();
        $provinsi->name = $request->name;
        $provinsi->tujuan_id = $request->tujuan_id;
        $provinsi->status = isset($request->status) ? 'active' : 'inactive';
        $provinsi->save();
        $notification = trans('admin.Create Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-provinsi.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikTujuanProvinsi::findOrFail($id);
        $tujuan = MudikTujuan::pluck('name', 'id');
        return view('admin.mudik.provinsiEdit', compact('category', 'tujuan'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
        ];
        $this->validate($request, $rules);
        $provinsi = MudikTujuanProvinsi::findOrFail($id);
        $provinsi->name = $request->name;
        $provinsi->tujuan_id = $request->tujuan_id;
        $provinsi->status = isset($request->status) ? 'active' : 'inactive';
        if ($provinsi->save()) {
            MudikTujuanKota::where('provinsi_id', $id)->update([
                'tujuan_id' => $request->tujuan_id
            ]);
        }
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-provinsi.index')->with($notification);
    }

    public function destroy($id)
    {
        MudikTujuanProvinsi::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
