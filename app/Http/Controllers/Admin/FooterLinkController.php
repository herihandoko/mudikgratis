<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:footer-link-index|footer-link-create|footer-link-edit|footer-link-delete', ['only' => ['index','show']]);
         $this->middleware('permission:footer-link-create', ['only' => ['create','store']]);
         $this->middleware('permission:footer-link-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:footer-link-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FooterLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footerSocialLinkIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footerSocialLinkCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new FooterLink();
        $link->name = $request->name;
        $link->link = $request->link;
        $link->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.footer-link.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = FooterLink::findOrFail($id);
        return view('admin.footerSocialLinkEdit', compact('link'));
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
        $link = FooterLink::findOrFail($id);
        $link->name = $request->name;
        $link->link = $request->link;
        $link->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.footer-link.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();
    }
}
