<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioDataTable;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:portfolio-index|portfolio-create|portfolio-edit|portfolio-delete', ['only' => ['index','show']]);
         $this->middleware('permission:portfolio-create', ['only' => ['create','store']]);
         $this->middleware('permission:portfolio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:portfolio-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PortfolioDataTable $portfolioDataTable)
    {
        return $portfolioDataTable->render('admin.portfolioIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolioCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->image = $request->image;
        $portfolio->title = $request->title;
        $portfolio->slug = $request->slug;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->location = $request->location;
        $portfolio->category = $request->category;
        $portfolio->start_date = Carbon::parse($request->start_date)->format('Y-m-d\TH:i');
        $portfolio->end_date = Carbon::parse($request->end_date)->format('Y-m-d\TH:i');
        $portfolio->website = $request->website;
        $portfolio->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.portfolio.index')->with($notification);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolioEdit', compact('portfolio'));
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
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->image = $request->image;
        $portfolio->title = $request->title;
        $portfolio->slug = $request->slug;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->location = $request->location;
        $portfolio->category = $request->category;
        $portfolio->start_date = Carbon::parse($request->start_date)->format('Y-m-d\TH:i');
        $portfolio->end_date = Carbon::parse($request->end_date)->format('Y-m-d\TH:i');
        $portfolio->website = $request->website;
        $portfolio->save();


        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.portfolio.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfolio::findOrFail($id)->delete();
    }
}
