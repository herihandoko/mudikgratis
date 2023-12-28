<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-review-index|product-review-create|product-review-edit|product-review-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-review-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-review-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-review-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductReviewDataTable $productReviewDataTable)
    {
        return $productReviewDataTable->render('admin.productReviewIndex');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        if ($productReview->status == 1) {
            $productReview->status = 0;
        } else {
            $productReview->status = 1;
        }
        $productReview->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductReview::find($id)->delete();
    }
}
