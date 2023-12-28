<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikKotaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MudikKotaController extends Controller
{
    //
    public function index(MudikKotaDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.tujuanIndex');
    }
}
