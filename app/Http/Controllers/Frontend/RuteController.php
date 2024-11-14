<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    //
    public function index()
    {
        $period = MudikPeriod::where('status', 'active')->first();
        $tujuans = MudikTujuan::with('provinsis')->where('status', 'active')->where('id_period', $period->id)->get();
        return view('frontend.ruteIndex', compact('tujuans'));
    }
}
