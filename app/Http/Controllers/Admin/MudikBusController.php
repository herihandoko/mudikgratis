<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikBusDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MudikBusController extends Controller
{
    //
    public function index(MudikBusDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.tujuanIndex');
    }
}
