<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\Models\Peserta;
use App\Models\User;

class MudikPenggunaController extends Controller
{
    //
    public function index(MudikPenggunaDataTable $dataTables)
    {
        return $dataTables->render('admin.mudik.penggunaIndex');
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
