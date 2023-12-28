<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ParallaxDataTable;
use App\Http\Controllers\Controller;
use App\Models\Parallax;
use Illuminate\Http\Request;

class ParallaxController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:parallax-index|parallax-create|parallax-edit|parallax-delete', ['only' => ['index','show']]);
         $this->middleware('permission:parallax-create', ['only' => ['create','store']]);
         $this->middleware('permission:parallax-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:parallax-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parallax = Parallax::first();
        return view('admin.parallaxIndex', compact('parallax'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'image' => 'required',
            'icon' => 'required',

        ];
        $customMessages = [
            'image.required' => trans('admin.Image is required!'),
            'icon.required' => trans('admin.Icon is required!'),
        ];
        $this->validate($request, $rules, $customMessages);


        $parallax = Parallax::first();
        if (!$parallax) {
            $parallax = new Parallax();
        }
        $parallax->title = $request->title;
        $parallax->icon = $request->icon;
        $parallax->image = $request->image;
        $parallax->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.parallax.index')->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parallax $parallax)
    {
        $parallax->delete();
    }
}
