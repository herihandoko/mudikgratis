<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-index|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('admin.productIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();


        $rules = [
            'short_description' => 'required',
            'description' => 'required',
            'name' => 'required|unique:products',
        ];

        $customMessages = [
            'name.required' => trans('Name is required!'),
            'name.unique' => trans('Name already exist!'),
            'short_description.required' => trans('Short description is required!'),
            'description.required' => trans('Description is required!'),
        ];

        $this->validate($request, $rules, $customMessages);



        $product->image = $request->media;
        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else $product->slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->image = $request->media;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->brand = $request->brand;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->weight = $request->weight;
        $product->dimensions = $request->dimensions;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.product.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.productEdit', compact('product'));
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
            'short_description' => 'required',
            'description' => 'required',
            'name' =>'required|unique:products,name,'.$id,
        ];

        $customMessages = [
            'name.required' => trans('Name is required!'),
            'name.unique' => trans('Name already exist!'),
            'short_description.required' => trans('Short description is required!'),
            'description.required' => trans('Description is required!'),
        ];

        $this->validate($request, $rules, $customMessages);


        $product = Product::findOrFail($id);

        $product->image = $request->media;

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else $product->slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->brand = $request->brand;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->weight = $request->weight;
        $product->dimensions = $request->dimensions;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.product.index')->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::findOrFail($id)->orders()->count() > 0) {
            Product::findOrFail($id)->onlyTrashed();
        }
        Product::findOrFail($id)->reviews()->delete();
        Product::findOrFail($id)->delete();
    }
}
