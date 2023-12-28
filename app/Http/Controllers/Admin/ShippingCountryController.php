<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShippingCountryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ShippingCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingCountryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shipping-country-index|shipping-country-create|shipping-country-edit|shipping-country-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shipping-country-create', ['only' => ['create','store']]);
         $this->middleware('permission:shipping-country-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shipping-country-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingCountryDataTable $shippingCountryDataTable)
    {
        return $shippingCountryDataTable->render('admin.shippingCountryIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shippingCountryCreate');
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
            'country' => 'required',
            'shipping_fee' => 'required',
        ];

        $customMessages = [
            'name.required' => trans('Country is required'),
            'shipping_fee.required' => trans('Shipping fee is required'),

        ];

        $this->validate($request, $rules, $customMessages);


        $country = new ShippingCountry();
        $country->country = $request->country;
        $country->shipping_fee = $request->shipping_fee;
        $country->save();


        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shipping-country.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = ShippingCountry::findOrFail($id);
        return view('admin.shippingCountryEdit', compact('country'));
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
            'country' => 'required',
            'shipping_fee' => 'required',
        ];

        $customMessages = [
            'name.required' => trans('Country is required'),
            'shipping_fee.required' => trans('Shipping fee is required'),

        ];

        $this->validate($request, $rules, $customMessages);

        $country = ShippingCountry::findOrFail($id);
        $country->shipping_fee = $request->shipping_fee;
        $country->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shipping-country.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShippingCountry::findOrFail($id)->delete();
    }
}
