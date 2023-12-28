<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:privacy-policy-index|privacy-policy-create|privacy-policy-edit|privacy-policy-delete', ['only' => ['index','show']]);
         $this->middleware('permission:privacy-policy-create', ['only' => ['create','store']]);
         $this->middleware('permission:privacy-policy-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:privacy-policy-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacy = PrivacyPolicy::first();
        return view('admin.privacyPolicyIndex', compact('privacy'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $privacy = PrivacyPolicy::first();
        if (!$privacy) {
            $privacy = new PrivacyPolicy();
        }
        $privacy->content = $request->content;
        $privacy->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);


    }
}
