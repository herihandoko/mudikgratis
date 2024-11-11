<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikPeriodeDataTable;
use App\DataTables\MudikTujuanDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MudikPeriodeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mudik-periode-index|mudik-periode-create|mudik-periode-edit|mudik-periode-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mudik-periode-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mudik-periode-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mudik-periode-delete', ['only' => ['destroy']]);
    }

    public function index(MudikPeriodeDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.periodeIndex');
    }

    public function create()
    {
        return view('admin.mudik.periodeCreate');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i|before_or_equal:end_date',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start_date',
        ];
        $this->validate($request, $rules);
        $periode = new MudikPeriod();
        if ($request->status) {
            MudikPeriod::where('status', 'active')->update(['status' => 'inactive']);
        }
        $periode->name = $request->name;
        $periode->start_date = Carbon::parse($request->start_date)->format('Y-m-d\TH:i');
        $periode->end_date = Carbon::parse($request->end_date)->format('Y-m-d\TH:i');
        $periode->description = $request->description;
        $periode->status = $request->status ? 'active' : 'inactive';
        $periode->status_pendaftaran = $request->status_pendaftaran ? 'open' : 'close';
        $periode->save();
        $notification = "Tambah periode mudik berhasil";
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-periode.index')->with($notification);
    }

    public function edit($id)
    {
        $category = MudikPeriod::findOrFail($id);
        return view('admin.mudik.periodeEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i|before_or_equal:end_date',
            'end_date' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start_date',
        ];
        $this->validate($request, $rules);
        $periode = MudikPeriod::findOrFail($id);
        if ($request->status) {
            MudikPeriod::where('status', 'active')->update(['status' => 'inactive']);
        }
        $periode->name = $request->name;
        $periode->start_date = Carbon::parse($request->start_date)->format('Y-m-d\TH:i');
        $periode->end_date = Carbon::parse($request->end_date)->format('Y-m-d\TH:i');
        $periode->description = $request->description;
        $periode->status = $request->status ? 'active' : 'inactive';
        $periode->status_pendaftaran = $request->status_pendaftaran ? 'open' : 'close';
        $periode->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.mudik-periode.index')->with($notification);
    }

    public function destroy($id)
    {
        MudikPeriod::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
