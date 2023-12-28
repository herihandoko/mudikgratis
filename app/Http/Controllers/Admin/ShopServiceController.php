<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShopServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\ShopService;
use Illuminate\Http\Request;

class ShopServiceController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:shop-service-index|shop-service-create|shop-service-edit|shop-service-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shop-service-create', ['only' => ['create','store']]);
         $this->middleware('permission:shop-service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shop-service-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopServiceDataTable $shopServiceDataTable)
    {
        return $shopServiceDataTable->render('admin.shopServiceIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shopServiceCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ShopService();
        $service->title = $request->title;
        $service->subtitle = $request->subtitle;
        $service->icon = $request->icon;
        $service->save();
        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shop-service.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ShopService::findOrFail($id);
        return view('admin.shopServiceEdit', compact('service'));
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
        $service = ShopService::findOrFail($id);
        $service->title = $request->title;
        $service->subtitle = $request->subtitle;
        $service->icon = $request->icon;
        $service->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.shop-service.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShopService::findOrFail($id)->delete();
    }
}
