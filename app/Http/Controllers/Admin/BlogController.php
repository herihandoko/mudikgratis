<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:blog-index|blog-create|blog-edit|blog-delete', ['only' => ['index','show']]);
         $this->middleware('permission:blog-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTables)
    {
        return $dataTables->render('admin.blogIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogPost');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();


        $rules = [

            'title' => 'required|unique:blogs',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required',


        ];

        $customMessages = [
            'category_id.required' => trans('admin.Category is required!'),
            'title.required' => trans('admin.Title is required!'),
            'slug.required' => trans('admin.Slug is required!'),
            'title.required' => trans('admin.Title already exist!'),
            'slug.required' => trans('admin.Slug already exist!'),

        ];

        $this->validate($request, $rules, $customMessages);


        $blog->image = $request->blog_image;
        $blog->title = $request->title;
        if ($request->filled('slug')) {
            $blog->slug = Str::slug($request->slug);
        } else $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        if ($request->status == 'on') {
            $blog->status = 1;
        } else $blog->status = 0;
        if ($request->comment_status == 'on') {
            $blog->comment_status = 1;
        } else $blog->comment_status = 0;
        if ($request->on_featured == 'on') {
            $blog->on_featured = 1;
        } else $blog->on_featured = 0;
        $blog->save();

        $notification = trans('admin.Posted Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.blog.index')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogEdit', compact('blog'));
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
            'category_id' => 'required',
            'title' => 'required|unique:blogs,title,' . $id,
            'slug' => 'required|unique:blogs,slug,' . $id,


        ];

        $customMessages = [
            'category_id.required' => trans('admin.Category is required!'),
            'title.required' => trans('admin.Title is required!'),
            'slug.required' => trans('admin.Slug is required!'),
            'title.required' => trans('admin.Title already exist!'),
            'slug.required' => trans('admin.Slug already exist!'),

        ];

        $this->validate($request, $rules, $customMessages);


        $blog =  Blog::findOrFail($id);
        $blog->image = $request->blog_image;
        $blog->title = $request->title;
        if ($request->filled('slug')) {
            $blog->slug = Str::slug($request->slug);
        } else $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        if ($request->status == 'on') {
            $blog->status = 1;
        } else $blog->status = 0;
        if ($request->comment_status == 'on') {
            $blog->comment_status = 1;
        } else $blog->comment_status = 0;
        if ($request->on_featured == 'on') {
            $blog->on_featured = 1;
        } else $blog->on_featured = 0;
        $blog->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.blog.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        $blog->comments()->delete();
        $blog->delete();
    }
}
