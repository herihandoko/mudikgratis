<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StatisticDataTable;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatisticController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:statistic-index|statistic-create|statistic-edit|statistic-delete', ['only' => ['index','show']]);
         $this->middleware('permission:statistic-create', ['only' => ['create','store']]);
         $this->middleware('permission:statistic-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:statistic-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistic = Statistic::first();
        return view('admin.statisticIndex', compact('statistic'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statistic = Statistic::findOrFail($id);
        return view('admin.statisticIndex', compact('statistic'));
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
            'description' => 'required',
            'subtitle' => 'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'description.required' => trans('Description is required'),
            'subtitle.required' => trans('Subtitle is required'),
        ];

        $this->validate($request, $rules, $customMessages);


        $statistic = Statistic::first();
        if (!$statistic) {
            $statistic = new Statistic();
        }
        $statistic->title = $request->title;
        $statistic->subtitle = $request->subtitle;
        $statistic->description = $request->description;
        $statistic->image = $request->image;
        $statistic->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.statistic.index')->with($notification);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
    }
}
