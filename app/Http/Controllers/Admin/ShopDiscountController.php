<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use PhpOffice\PhpSpreadsheet\Reader\Xls\Color\BIFF5;

class ShopDiscountController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shop-discount-index|shop-discount-create|shop-discount-edit|shop-discount-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shop-discount-create', ['only' => ['create','store']]);
         $this->middleware('permission:shop-discount-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shop-discount-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = ShopDiscount::first();
        return view('admin.shopDiscountIndex', compact('discount'));
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
            'image' => 'required',
            'main_heading' => 'required',
            'sub_heading' => 'required',
            'discount_text' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ];

        $customMessages = [
            'image.required' => trans('Image is required'),
            'main_heading.required' => trans('Main heading is required'),
            'sub_heading.required' => trans('Sub heading is required'),
            'discount_text.required' => trans('Discount text fee is required'),
            'button_text.required' => trans('Button text is required'),
            'button_link.required' => trans('Button link is required'),

        ];

        $this->validate($request, $rules, $customMessages);


        $slider = new ShopDiscount();
        if (ShopDiscount::count()) {
            $slider = ShopDiscount::first();
        }

        $slider->image = $request->image;
        $slider->main_heading = $request->main_heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->discount_text = $request->discount_text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
