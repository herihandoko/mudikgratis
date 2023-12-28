<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class PagePreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pageBuilderPreview');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->data) {
            $elements = $request->data;
            $elements = explode(',', $elements);
            $page = new stdClass();
            $page->title = $request->title;
            return view('frontend.layouts.pageAjax', compact('elements', 'page'));
        }
        return response([
            'Error' => 'No Element Selected',
        ]);
    }
}
