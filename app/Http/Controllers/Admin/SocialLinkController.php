<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialLinkController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:social-link-index|social-link-create|social-link-edit|social-link-delete', ['only' => ['index','show']]);
         $this->middleware('permission:social-link-create', ['only' => ['create','store']]);
         $this->middleware('permission:social-link-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:social-link-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.headerSocialLinkIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.headerSocialLinkCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'link' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'link.required' => trans('Link is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);


        $social = new SocialLink();
        if ($request->on_header == 'on') {
            $social->on_header = 1;
        } else $social->on_header = 0;
        if ($request->on_footer == 'on') {
            $social->on_footer = 1;
        } else $social->on_footer = 0;
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.social-link.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social =  SocialLink::findOrFail($id);
        return view('admin.headerSocialLinkEdit', compact('social'));
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

        $rules = [
            'link' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'link.required' => trans('Link is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $social =  SocialLink::findOrFail($id);
        if ($request->on_header == 'on') {
            $social->on_header = 1;
        } else $social->on_header = 0;
        if ($request->on_footer == 'on') {
            $social->on_footer = 1;
        } else $social->on_footer = 0;
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.social-link.index')->with($notification);
    }

    public function destroy($id){
        SocialLink::findOrFail($id)->delete();
    }
}
