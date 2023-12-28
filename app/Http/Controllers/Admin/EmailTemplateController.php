<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\EmailTemplateVariable;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:email-template-index|email-template-create|email-template-edit|email-template-delete', ['only' => ['index','show']]);
         $this->middleware('permission:email-template-create', ['only' => ['create','store']]);
         $this->middleware('permission:email-template-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:email-template-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email_template = EmailTemplate::findOrFail($id);
        $variables = EmailTemplateVariable::where(['template_id' => $id])->get();
        return view('admin.emailTemplateEdit', compact('email_template', 'variables'));
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
        $email_template = EmailTemplate::findOrFail($id);
        $email_template->subject = $request->subject;
        $email_template->description = $request->description;
        $email_template->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.settings')->with($notification);

    }
}
