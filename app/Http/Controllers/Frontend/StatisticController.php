<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MudikTujuan;

class StatisticController extends Controller
{
    //
    public function index()
    {
        $tujuans = MudikTujuan::with('provinsis')->where('status', 'active')->get();
        return view('frontend.statisticIndex', compact('tujuans'));
    }
}
