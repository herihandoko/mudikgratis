<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-category-index|product-category-create|product-category-edit|product-category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategoryDataTable $productCategoryDataTable)
    {
        return $productCategoryDataTable->render('admin.productCategoryIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCategoryCreate');
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
            'name' => 'required|unique:product_categories',
        ];

        $customMessages = [
            'name.required' => trans('Name is required'),
            'name.unique' => trans('Name already exist'),
        ];

        $this->validate($request, $rules, $customMessages);

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->save();


        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.product-category.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('admin.productCategoryEdit', compact('category'));
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
            'name' => 'required|unique:product_categories,name,' . $id,
        ];

        $customMessages = [
            'name.required' => trans('Name is required'),
            'name.unique' => trans('Name already exist'),
        ];

        $this->validate($request, $rules, $customMessages);


        $category =  ProductCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.product-category.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $count = ProductCategory::findOrFail($id)->products->count();
        if ($count) {
            return response([
                'status' => 'failed',
            ]);
        }
        ProductCategory::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);

    }
}
