<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class IntroController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:intro-index|intro-create|intro-edit|intro-delete', ['only' => ['index','show']]);
         $this->middleware('permission:intro-create', ['only' => ['create','store']]);
         $this->middleware('permission:intro-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:intro-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intro = Intro::first();
        return view('admin.introIndex', compact('intro'));
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
            'description' => 'required',
            'why_choose_us_description' => 'required',

        ];
        $customMessages = [
            'description.required' => trans('admin.Description is required!'),
            'why_choose_us_description.required' => trans('admin.Why choose us description is required!'),
        ];
        $this->validate($request, $rules, $customMessages);


        $intro = Intro::first();
        if (!$intro) {
            $intro = new Intro();
        }
        $intro->background = $request->background;
        $intro->title                     = $request->title;
        $intro->subtitle                  = $request->subtitle;
        $intro->description               = $request->description;
        $intro->why_choose_us_icon        = $request->why_choose_us_icon;
        $intro->why_choose_us_title       = $request->why_choose_us_title;
        $intro->why_choose_us_description = $request->why_choose_us_description;
        $intro->contact_title             = $request->contact_title;
        $intro->contact_subtitle          = $request->contact_subtitle;
        $intro->contact_number            = $request->contact_number;
        $intro->item_one_title            = $request->item_one_title;
        $intro->item_one_description      = $request->item_one_description;
        $intro->item_two_title            = $request->item_two_title;
        $intro->item_two_description      = $request->item_two_description;
        $intro->button_text       = $request->button_text;
        $intro->button_link       = $request->button_link;
        $intro->save();



        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.intro.index')->with($notification);
    }
}
