<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikProvinsiDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MudikProvinsiController extends Controller
{
    //
    public function index(MudikProvinsiDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.tujuanIndex');
    }
}
