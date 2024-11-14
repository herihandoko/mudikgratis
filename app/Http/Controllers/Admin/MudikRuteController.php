<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikRuteDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikRute;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MudikRuteController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:mudik-rute-index|mudik-rute-create|mudik-rute-edit|mudik-rute-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-rute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-rute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-rute-delete', ['only' => ['destroy']]);
    }

    public function index(MudikRuteDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.ruteIndex');
    }

    public function create()
    {
        return view('admin.mudik.ruteCreate');
    }

    public function store(Request $request, MudikRute $mudikRute)
    {
        $rules = [
            'name' => 'required|max:255|unique:mudik_rute'
        ];
        $this->validate($request, $rules);
        $mudikRute->name = $request->name;
        $mudikRute->created_at = date('Y-m-d H:i:s');
        $mudikRute->created_by = auth()->user()->name;
        $mudikRute->id_period = session('id_period');
        $mudikRute->save();
        $notification = "Tambah rute mudik berhasil";
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-rute.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikRute::findOrFail($id);
        return view('admin.mudik.ruteEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255|unique:mudik_rute,name,' . $id,
        ];
        $this->validate($request, $rules);
        $rute = MudikRute::findOrFail($id);
        $rute->name = $request->name;
        $rute->updated_at = date('Y-m-d H:i:s');
        $rute->updated_by = auth()->user()->name;
        $rute->id_period = session('id_period');
        $rute->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-rute.index')->with($notification);
    }

    public function destroy($id)
    {
        MudikRute::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
