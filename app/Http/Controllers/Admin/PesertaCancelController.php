<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HistoryDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\DataTables\PesertaCancelDataTable;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use App\Models\User;
use App\Models\UserInactive;
use Illuminate\Http\Request;

class PesertaCancelController extends Controller
{
    //
    public function index(Request $request)
    {
        $dataTables = new PesertaCancelDataTable();
        return $dataTables->render('admin.mudik.cancelIndex');
    }
}
