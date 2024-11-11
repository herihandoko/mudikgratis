<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Correspondent;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class SurveiReportController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:survei-report-index|survei-report-create|survei-report-edit|survei-report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:survei-report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:survei-report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:survei-report-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $unsur = SurveyQuestion::where('id_period', session('id_period'))->orderBy('sorting', 'asc')->get();
        $indikator = [];
        foreach ($unsur as $key => $item) {
            $nilai = [];
            foreach ($item->respondenAnswer as $key => $value) {
                $nilai[] = $value->nilai;
            }
            $indikator['indikator_' . $item->id] = $nilai;
        }

        $rataRataIndikator = [];
        $ikmText = '-';
        $ikm = 0;
        $jumlahCorespondent = Correspondent::where('id_period', session('id_period'))->count();
        $ikmColor = '';
        if ($indikator && $jumlahCorespondent > 0) {
            foreach ($indikator as $key => $nilai) {
                $rataRataIndikator[$key] = $this->hitungRataRata($nilai);
            }
            $jumlahRataRata = array_sum($rataRataIndikator);
            $jumlahIndikator = count($rataRataIndikator);
            $ikm = round($jumlahRataRata / $jumlahIndikator, 2);
            if ($ikm >= 4) {
                $ikmText = "Sangat Puas";
                $ikmColor = "text-success";
            } elseif ($ikm >= 3) {
                $ikmText =  "Puas";
                $ikmColor = "text-success";
            } elseif ($ikm >= 2) {
                $ikmText =  "Kurang Puas";
                $ikmColor = "text-warning";
            } else {
                $ikmText =  "Tidak Puas";
                $ikmColor = "text-danger";
            }
        }
        return view('admin.survei.reportIndex', compact('unsur', 'ikm', 'ikmText', 'jumlahCorespondent', 'ikmColor'));
    }

    function hitungRataRata($nilai)
    {
        $jumlah = array_sum($nilai);
        $totalResponden = count($nilai);
        return $jumlah / $totalResponden;
    }
}
