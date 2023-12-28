<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopSetting;
use Illuminate\Http\Request;

class ShopSettingController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shop-settings-index|shop-settings-create|shop-settings-edit|shop-settings-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shop-settings-create', ['only' => ['create','store']]);
         $this->middleware('permission:shop-settings-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shop-settings-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = ShopSetting::first();
        return view('admin.shopSettingIndex', compact('setting'));
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
        $setting = ShopSetting::first();
        if (!$setting) {
            $setting = new ShopSetting();
        }
        $setting->default_shipping_fee = $request->default_shipping_fee;
        $setting->tax = $request->tax;
        $setting->status = $request->status;
        $setting->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
