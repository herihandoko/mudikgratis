<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SponsorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:sponsor-index|sponsor-create|sponsor-edit|sponsor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:sponsor-create', ['only' => ['create','store']]);
         $this->middleware('permission:sponsor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sponsor-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SponsorDataTable $dataTables)
    {
        return $dataTables->render('admin.sponsorIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsorCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->image = $request->image;
        $sponsor->save();
        $notification = trans('admin.Sponsor Created!');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.sponsor.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsorEdit', compact('sponsor'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $sponsor = Sponsor::findOrFail($id);
        $sponsor->name = $request->name;
        $sponsor->image = $request->image;
        $sponsor->save();
        $notification = trans('admin.Sponsor Updated!');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.sponsor.index')->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
    }
}
