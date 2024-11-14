<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HistoryDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use App\Models\User;
use App\Models\UserInactive;
use Illuminate\Http\Request;

class HistoryNotifikasiController extends Controller
{
    //
    public function index(Request $request)
    {
        $dataTables = new HistoryDataTable();
        return $dataTables->render('admin.mudik.historyIndex');
    }
}
