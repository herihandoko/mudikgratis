<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterContactItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterContactItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterContactItemController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:footer-contact-item-index|footer-contact-item-create|footer-contact-item-edit|footer-contact-item-delete', ['only' => ['index','show']]);
         $this->middleware('permission:footer-contact-item-create', ['only' => ['create','store']]);
         $this->middleware('permission:footer-contact-item-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:footer-contact-item-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FooterContactItemDataTable $dataTable)
    {
        return $dataTable->render('admin.footerContactItemIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footerContactItemCreate');
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
            'icon' => 'required',
            'name' => 'required',
            'content' => 'required',

        ];
        $customMessages = [
            'icon.required' => trans('admin.Icon is required!'),
            'name.required' => trans('admin.Name is required!'),
            'content.required' => trans('admin.Content is required!'),
        ];
        $this->validate($request, $rules, $customMessages);


        $item = new FooterContactItem();
        $item->icon = $request->icon;
        $item->name = $request->name;
        $item->content = $request->content;
        $item->save();


        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.footer-contact-item.index')->with($notification);


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = FooterContactItem::findOrFail($id);
        return view('admin.footerContactItemEdit', compact('item'));
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
            'icon' => 'required',
            'name' => 'required',
            'content' => 'required',

        ];
        $customMessages = [
            'icon.required' => trans('admin.Icon is required!'),
            'name.required' => trans('admin.Name is required!'),
            'content.required' => trans('admin.Content is required!'),
        ];
        $this->validate($request, $rules, $customMessages);

        $item = FooterContactItem::findOrFail($id);
        $item->icon = $request->icon;
        $item->name = $request->name;
        $item->content = $request->content;
        $item->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.footer-contact-item.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterContactItem $footerContactItem)
    {
        $footerContactItem->delete();
    }
}
