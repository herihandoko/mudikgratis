<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikTujuanDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MudikTujuanController extends Controller
{
    public function index(MudikTujuanDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.tujuanIndex');
    }
}
