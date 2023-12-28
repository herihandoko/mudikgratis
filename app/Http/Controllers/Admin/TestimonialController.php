<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:testimonial-index|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','show']]);
         $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
         $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestimonialDataTable $dataTables)
    {
        return $dataTables->render('admin.testimonialIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonialCreate');
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
            'designation' => 'required',
            'name' => 'required',
            'comment' => 'required',
        ];

        $customMessages = [
            'designation.required' => trans('Designation is required'),
            'name.required' => trans('Name is required'),
            'comment.required' => trans('Comment is required'),
        ];

        $this->validate($request, $rules, $customMessages);




        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->image = $request->image;
        $testimonial->comment = $request->comment;
        $testimonial->save();
        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.testimonial.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonialEdit', compact('testimonial'));
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
            'designation' => 'required',
            'name' => 'required',
            'comment' => 'required',
        ];

        $customMessages = [
            'designation.required' => trans('Designation is required'),
            'name.required' => trans('Name is required'),
            'comment.required' => trans('Comment is required'),
        ];

        $this->validate($request, $rules, $customMessages);



        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->image = $request->image;
        $testimonial->comment = $request->comment;
        $testimonial->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.testimonial.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
    }
}
