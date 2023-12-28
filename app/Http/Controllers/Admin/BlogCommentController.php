<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:blog-comment-index|blog-comment-create|blog-comment-edit|blog-comment-delete', ['only' => ['index','show']]);
         $this->middleware('permission:blog-comment-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-comment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-comment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogCommentDataTable $blogCommentDataTable)
    {
        return $blogCommentDataTable->render('admin.blogComments');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        if ($blogComment->status == 1) {
            $blogComment->status = 0;
            $notification = trans('admin.Hidden Successfully');
        } else {
            $blogComment->status = 1;
            $notification = trans('admin.Shown Successfully');
        }
        $blogComment->save();



        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        $blogComment->delete();
    }
}
