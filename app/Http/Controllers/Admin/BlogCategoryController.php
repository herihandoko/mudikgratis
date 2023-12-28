<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:blog-category-index|blog-category-create|blog-category-edit|blog-category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:blog-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogCategoryDataTable $dataTables)
    {
        return $dataTables->render('admin.blogCategories');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategoryAdd');
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
            'name' => 'required|unique:blog_categories',
            'slug' => 'required|unique:blog_categories',
        ];
        $customMessages = [
            'name.required' => trans('admin.Name is required!'),
            'slug.required' => trans('admin.Slug is required!'),
            'name.unique' => trans('admin.Name already exist!'),
            'slug.unique' => trans('admin.Slug already exist!'),
        ];
        $this->validate($request, $rules, $customMessages);
        $category = new BlogCategory();
        $category->name = $request->name;
        if ($request->filled('slug')) {
            $category->slug = Str::slug($request->slug);
        } else $category->slug = Str::slug($request->name);
        $category->save();
        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.blog-category.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blogCategoryEdit', compact('category'));
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
            'name' => 'required|unique:blog_categories,name,' . $id,
            'slug' => 'required|unique:blog_categories,slug,' . $id,
        ];
        $customMessages = [
            'name.required' => trans('admin.Name is required!'),
            'slug.required' => trans('admin.Slug is required!'),
            'name.unique' => trans('admin.Name already exist!'),
            'slug.unique' => trans('admin.Slug already exist!'),
        ];
        $this->validate($request, $rules, $customMessages);
        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        if ($request->filled('slug')) {
            $category->slug = Str::slug($request->slug);
        } else $category->slug = Str::slug($request->name);

        $category->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.blog-category.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = BlogCategory::findOrFail($id)->getBlogs->count();
        if ($count) {
            return response([
                'status' => 'failed',
            ]);
        }
        BlogCategory::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
