<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:order-index|order-create|order-edit|order-delete', ['only' => ['index','show']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('admin.orderIndex');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.OrderShow', compact('order'));
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
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
    OrderItem::where(['order_id' => $id])->delete();
       Order::findOrFail($id)->delete();
    }
}
