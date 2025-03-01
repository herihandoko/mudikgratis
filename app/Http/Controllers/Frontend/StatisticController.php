<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;

class StatisticController extends Controller
{
    //
    public function index()
    {
        $period = MudikPeriod::where('status', 'active')->first();
        $tujuans = MudikTujuan::with('provinsis')->where('status', 'active')->where('id_period', $period->id ?? 0)->get();
        return view('frontend.statisticIndex', compact('tujuans'));
    }
}
