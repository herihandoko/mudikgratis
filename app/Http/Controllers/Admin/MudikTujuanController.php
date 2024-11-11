<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikTujuanDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class MudikTujuanController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mudik-tujuan-index|mudik-tujuan-create|mudik-tujuan-edit|mudik-tujuan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-tujuan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-tujuan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-tujuan-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request, MudikTujuanDataTable $dataTables)
    {
        $periode = MudikPeriod::select('id', DB::raw("CONCAT(name, ' ( ', status, ' )') AS name"))->orderBy('id', 'desc')->pluck('name', 'id');
        return $dataTables->render('admin.mudik.tujuanIndex', compact('periode', 'request'));
    }

    public function create()
    {
        $periode = MudikPeriod::select('id', DB::raw("CONCAT(name, ' ( ', status, ' )') AS name"))->orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.mudik.tujuanCreate', compact('periode'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'id_period' => 'required',
            'code' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $periode = new MudikTujuan();
        $periode->name = $request->name;
        $periode->code = $request->code;
        $periode->id_period = $request->id_period;
        $periode->status = isset($request->status) ? 'active' : 'inactive';
        $periode->save();
        $notification =  trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-tujuan.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikTujuan::findOrFail($id);
        $periode = MudikPeriod::select('id', DB::raw("CONCAT(name, ' ( ', status, ' )') AS name"))->orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.mudik.tujuanEdit', compact('category', 'periode'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'id_period' => 'required',
            'code' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $periode = MudikTujuan::findOrFail($id);
        $periode->name = $request->name;
        $periode->code = $request->code;
        $periode->id_period = $request->id_period;
        $periode->status = isset($request->status) ? 'active' : 'inactive';
        $periode->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-tujuan.index')->with($notification);
    }

    public function destroy($id)
    {
        MudikTujuan::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
