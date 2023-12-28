<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikPesertaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MudikPesertaController extends Controller
{
    //
    public function index(MudikPesertaDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.verifikasiIndex');
    }
}
