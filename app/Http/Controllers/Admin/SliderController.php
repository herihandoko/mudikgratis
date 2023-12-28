<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:slider-index|slider-create|slider-edit|slider-delete', ['only' => ['index','show']]);
         $this->middleware('permission:slider-create', ['only' => ['create','store']]);
         $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDataTable $sliderDataTable)
    {
        return $sliderDataTable->render('admin.sliderIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliderCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image = $request->image;
        $slider->button = $request->button;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.slider.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliderEdit', compact('slider'));
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

        $slider =  Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image = $request->image;
        $slider->button = $request->button;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.slider.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
    }
}
