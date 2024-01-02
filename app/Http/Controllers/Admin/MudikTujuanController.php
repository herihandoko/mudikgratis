<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikTujuanDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MudikTujuanController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mudik-tujuan-index|mudik-tujuan-create|mudik-tujuan-edit|mudik-tujuan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-tujuan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-tujuan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-tujuan-delete', ['only' => ['destroy']]);
    }

    public function index(MudikTujuanDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.tujuanIndex');
    }

    public function create()
    {
        return view('admin.mudik.tujuanCreate');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255'
        ];
        $this->validate($request, $rules);
        $periode = new MudikTujuan();
        $periode->name = $request->name;
        $periode->status = isset($request->status)?'active':'inactive';
        $periode->save();
        $notification =  trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-tujuan.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikTujuan::findOrFail($id);
        return view('admin.mudik.tujuanEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255'
        ];
        $this->validate($request, $rules);
        $periode = MudikTujuan::findOrFail($id);
        $periode->name = $request->name;
        $periode->status = isset($request->status)?'active':'inactive';
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
