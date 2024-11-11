<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RespondenDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveiResponController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:survei-respon-index|survei-respon-create|survei-respon-edit|survei-respon-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:survei-respon-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:survei-respon-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:survei-respon-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request, RespondenDataTable $dataTables)
    {
        return $dataTables->render('admin.survei.respondenIndex', compact('request'));
    }
}
