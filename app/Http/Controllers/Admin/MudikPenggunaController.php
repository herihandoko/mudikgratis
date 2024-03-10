<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class MudikPenggunaController extends Controller
{
    //
    public function index(Request $request)
    {
        $periode = MudikPeriod::pluck('name', 'id');
        $tujuan = MudikTujuan::pluck('name', 'id');
        $dataTables = new MudikPenggunaDataTable();
        return $dataTables->render('admin.mudik.penggunaIndex', compact('tujuan', 'request', 'periode'));
    }

    public function destroy($id)
    {
        if (User::findOrFail($id)->delete()) {
            Peserta::where('user_id', $id)->delete();
        }
        return response([
            'status' => 'success',
        ]);
    }
}
