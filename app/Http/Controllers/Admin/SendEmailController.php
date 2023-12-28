<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:send-email-index|send-email-create|send-email-edit|send-email-delete', ['only' => ['index','show']]);
         $this->middleware('permission:send-email-create', ['only' => ['create','store']]);
         $this->middleware('permission:send-email-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:send-email-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sendEmailIndex');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->subject,
            'body' => $request->message,
        ];
        $emails = [];
        foreach (\App\Models\Subscriber::where(['is_confirmed' => 1])->get() as  $subscriber) {
            $emails[] = $subscriber->email;
        }
        Mail::to($emails)->send(new \App\Mail\SendEmail($data));

        $notification = trans('admin.Email Sent to All Subscribers!');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
