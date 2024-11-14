<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MudikTujuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }
    public function dashboard()
    {
        $tujuans = MudikTujuan::with('provinsis')->where('status', 'active')->where('id_period', session('id_period'))->get();
        return view('admin.dashboard', compact('tujuans'));
    }
}
