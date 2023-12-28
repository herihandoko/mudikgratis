<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StatisticItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\StatisticItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatisticItemController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:statistic-item-index|statistic-item-create|statistic-item-edit|statistic-item-delete', ['only' => ['index','show']]);
         $this->middleware('permission:statistic-item-create', ['only' => ['create','store']]);
         $this->middleware('permission:statistic-item-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:statistic-item-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatisticItemDataTable $dataTables)
    {
        return $dataTables->render('admin.statisticItemIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statisticItemCreate');
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
            'title' => 'required',
            'subtitle' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'subtitle.required' => trans('Subtitle is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);


        $statistic_item = new StatisticItem();
        $statistic_item->title = $request->title;
        $statistic_item->subtitle = $request->subtitle;
        $statistic_item->icon = $request->icon;
        $statistic_item->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.statistic-item.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statistic_item = StatisticItem::findOrFail($id);
        return view('admin.statisticItemEdit', compact('statistic_item'));
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
            'title' => 'required',
            'subtitle' => 'required',
            'icon' => 'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'subtitle.required' => trans('Subtitle is required'),
            'icon.required' => trans('Icon is required'),
        ];

        $this->validate($request, $rules, $customMessages);


        $statistic_item = StatisticItem::findOrFail($id);
        $statistic_item->title = $request->title;
        $statistic_item->subtitle = $request->subtitle;
        $statistic_item->icon = $request->icon;
        $statistic_item->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.statistic-item.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatisticItem $statistic_item)
    {
        $statistic_item->delete();
    }
}
