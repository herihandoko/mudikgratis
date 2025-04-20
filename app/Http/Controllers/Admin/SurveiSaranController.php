<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SaranDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveiSaranController extends Controller
{
    //

    public function index(Request $request, SaranDataTable $dataTables)
    {
        return $dataTables->render('admin.survei.saranIndex', compact('request'));
    }
}
