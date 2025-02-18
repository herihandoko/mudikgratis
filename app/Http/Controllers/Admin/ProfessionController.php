<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProfessionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfessionController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:profession-index|profession-create|profession-edit|profession-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:profession-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:profession-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:profession-delete', ['only' => ['destroy']]);
    }

    public function index(ProfessionDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.professionIndex');
    }

    public function create()
    {
        return view('admin.mudik.professionCreate');
    }

    public function store(Request $request, Profession $mudikRute)
    {
        $rules = [
            'name' => 'required|max:255|unique:profession'
        ];
        $this->validate($request, $rules);
        $mudikRute->name = $request->name;
        $mudikRute->created_at = date('Y-m-d H:i:s');
        $mudikRute->created_by = auth()->user()->name;
        $mudikRute->save();
        $notification = "Tambah profession mudik berhasil";
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.profession.index')->with($notification);
    }

    public function edit($id)
    {
        $category = Profession::findOrFail($id);
        return view('admin.mudik.professionEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255|unique:profession,name,' . $id,
        ];
        $this->validate($request, $rules);
        $profession = Profession::findOrFail($id);
        $profession->name = $request->name;
        $profession->updated_at = date('Y-m-d H:i:s');
        $profession->updated_by = auth()->user()->name;
        $profession->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.profession.index')->with($notification);
    }

    public function destroy($id)
    {
        Profession::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
