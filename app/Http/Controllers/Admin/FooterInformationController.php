<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInformation as FooterInfo;
use Illuminate\Http\Request;

class FooterInformationController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:footer-information-index|footer-information-create|footer-information-edit|footer-information-delete', ['only' => ['index','show']]);
         $this->middleware('permission:footer-information-create', ['only' => ['create','store']]);
         $this->middleware('permission:footer-information-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:footer-information-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info =  FooterInfo::first();
        return view('admin.footerInformation', compact('info'));
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
        $info = FooterInfo::first();
        if (!$info) {
            $info = new FooterInfo();
        }
        $info->about = $request->about;
        $info->copyright = $request->copyright;
        $info->term_of_use = $request->term_of_use;
        $info->privacy_policy = $request->privacy_policy;
        $info->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);

    }
}
