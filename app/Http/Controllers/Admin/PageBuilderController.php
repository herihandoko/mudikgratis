<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PageBuilderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\PageBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageBuilderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:page-builder-index|page-builder-create|page-builder-edit|page-builder-delete', ['only' => ['index','show']]);
         $this->middleware('permission:page-builder-create', ['only' => ['create','store']]);
         $this->middleware('permission:page-builder-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:page-builder-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageBuilderDataTable $dataTables)
    {
        return $dataTables->render('admin.pageBuilderIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pageBuilderCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagebuilder = new PageBuilder();
        $pagebuilder->title = $request->title;
        if ($request->filled('slug')) {
            $pagebuilder->slug = Str::slug($request->slug);
        } else $pagebuilder->slug = Str::slug($request->title);
        $pagebuilder->contents  = $request->contents;
        $pagebuilder->save();


        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.page-builder.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = PageBuilder::findOrFail($id);
        $items = [];
        if ($page->contents) {
            $items = explode(',', $page->contents);
        }
        return view('admin.pageBuilderEdit', compact('page', 'items'));
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
        $pagebuilder = PageBuilder::findOrFail($id);
        $pagebuilder->title = $request->title;
        if ($request->filled('slug')) {
            $pagebuilder->slug = Str::slug($request->slug);
        } else $pagebuilder->slug = Str::slug($request->title);
        if ($id == 1) {
            $pagebuilder->slug = 'home';
        }
        $pagebuilder->contents  = $request->contents;
        $pagebuilder->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.page-builder.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            toast(trans('admin.Home page cannot be deleted!'), 'error')->width('400px');
            return false;
        }
        PageBuilder::find($id)->delete();
    }
}
