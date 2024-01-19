<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikBusDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;

class MudikBusController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mudik-bus-index|mudik-bus-create|mudik-bus-edit|mudik-bus-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-bus-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-bus-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-bus-delete', ['only' => ['destroy']]);
    }

    public function index(MudikBusDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.busIndex');
    }

    public function create()
    {
        return view('admin.mudik.busCreate');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'plat_nomor' => 'max:11',
            'jumlah_kursi' => 'numeric',
            'seat' => 'required'
        ];
        $this->validate($request, $rules);
        $periode = new Bus();
        $periode->name = $request->name;
        $periode->plat_nomor = $request->plat_nomor;
        $periode->jumlah_kursi = $request->jumlah_kursi;
        $periode->seat = $request->seat;
        $periode->pendamping = $request->pendamping;
        $periode->description = $request->description;
        $periode->status = isset($request->status)?'active':'inactive';
        $periode->save();
        $notification =  trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-bus.index')->with($notification);
    }

    public function edit($id)
    {
        $category = Bus::findOrFail($id);
        return view('admin.mudik.busEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255'
        ];
        $this->validate($request, $rules);
        $periode = Bus::findOrFail($id);
        $periode->name = $request->name;
        $periode->plat_nomor = $request->plat_nomor;
        $periode->jumlah_kursi = $request->jumlah_kursi;
        $periode->seat = $request->seat;
        $periode->pendamping = $request->pendamping;
        $periode->description = $request->description;
        $periode->status = isset($request->status)?'active':'inactive';
        $periode->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-bus.index')->with($notification);
    }

    public function destroy($id)
    {
        Bus::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
