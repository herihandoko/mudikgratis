<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShopSliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\ShopSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ShopSliderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shop-slider-index|shop-slider-create|shop-slider-edit|shop-slider-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shop-slider-create', ['only' => ['create','store']]);
         $this->middleware('permission:shop-slider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shop-slider-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopSliderDataTable $shopSliderDataTable)
    {
        return $shopSliderDataTable->render('admin.shopSliderIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shopSliderCreate');
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
            'foreground' => 'required',
            'background' => 'required',
            'main_heading' => 'required',
            'sub_heading' => 'required',
            'discount_text' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ];

        $customMessages = [
            'foreground.required' => trans('Foreground is required'),
            'background.required' => trans('Background is required'),
            'main_heading.required' => trans('Main heading is required'),
            'sub_heading.required' => trans('Sub heading is required'),
            'discount_text.required' => trans('Discount text fee is required'),
            'button_text.required' => trans('Button text is required'),
            'button_link.required' => trans('Button link is required'),

        ];

        $this->validate($request, $rules, $customMessages);




        $slider = new ShopSlider();
        $slider->foreground = $request->foreground;
        $slider->background = $request->background;
        $slider->main_heading = $request->main_heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->discount_text = $request->discount_text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();
        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shop-slider.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = ShopSlider::findOrFail($id);
        return view('admin.shopSliderEdit', compact('slide'));
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
            'foreground' => 'required',
            'background' => 'required',
            'main_heading' => 'required',
            'sub_heading' => 'required',
            'discount_text' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ];

        $customMessages = [
            'foreground.required' => trans('Foreground is required'),
            'background.required' => trans('Background is required'),
            'main_heading.required' => trans('Main heading is required'),
            'sub_heading.required' => trans('Sub heading is required'),
            'discount_text.required' => trans('Discount text fee is required'),
            'button_text.required' => trans('Button text is required'),
            'button_link.required' => trans('Button link is required'),

        ];

        $this->validate($request, $rules, $customMessages);

        $slider = ShopSlider::findOrFail($id);
        $slider->foreground = $request->foreground;
        $slider->background = $request->background;
        $slider->main_heading = $request->main_heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->discount_text = $request->discount_text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shop-slider.index')->with($notification);


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShopSlider::findOrFail($id)->delete();
    }
}
