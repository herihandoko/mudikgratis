<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderContact;
use Illuminate\Http\Request;

class HeaderContactController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:header-contact-index|header-contact-create|header-contact-edit|header-contact-delete', ['only' => ['index','show']]);
         $this->middleware('permission:header-contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:header-contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:header-contact-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = HeaderContact::first();
        return view('admin.headerContactIndex', compact('contact'));
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
        $header = HeaderContact::first();
        if (!$header) {
            $header = new HeaderContact();
        }
        $header->phone = $request->phone;
        $header->email = $request->email;
        $header->address = $request->address;
        $header->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);

    }
}
