<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:contact-page-index|contact-page-create|contact-page-edit|contact-page-delete', ['only' => ['index','show']]);
         $this->middleware('permission:contact-page-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-page-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-page-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactPage::first();
        return view('admin.contactPageIndex', compact('contact'));
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
        $contact = ContactPage::first();
        if (!$contact) {
            $contact = new ContactPage();
        }
        $contact->form_title = $request->form_title;
        $contact->form_subtitle = $request->form_subtitle;
        $contact->contact_title = $request->contact_title;
        $contact->contact_subtitle = $request->contact_subtitle;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
