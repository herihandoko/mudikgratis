<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:service-index|service-create|service-edit|service-delete', ['only' => ['index','show']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDataTable $dataTables)
    {
        return $dataTables->render('admin.serviceIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceCreate');
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
            'title' => 'required|unique:services',
            'slug'  => 'required|unique:services',
            'description' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'description.required' => trans('Description is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $service = new Service();
        $service->title = $request->title;
        if ($request->filled('slug')) {
            $service->slug = Str::slug($request->slug);
        } else $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->image = $request->image;
        $service->icon = $request->icon;
        $service->save();


        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.service.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.serviceEdit', compact('service'));
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
            'title' => 'required|unique:services,title,'.$id,
            'slug' => 'required|unique:services,slug,'.$id,
            'description' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'description.required' => trans('Description is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $service =  Service::findOrFail($id);
        $service->title = $request->title;
        if ($request->filled('slug')) {
            $service->slug = Str::slug($request->slug);
        } else $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->image = $request->image;
        $service->icon = $request->icon;
        $service->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.service.index')->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    }
}
