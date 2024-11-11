<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MudikTujuanDataTable;
use App\DataTables\SurveiPertanyaanDataTable;
use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Symfony\Component\Console\Question\Question;

class SurveiPertanyaanController extends Controller
{
    public $colors = [
        1 => 'ff0000',
        2 => 'ff5e5e',
        3 => 'ffa500',
        4 => 'aaff00',
        5 => '00ff00'
    ];
    public $icons = [
        1 => 'fas fa-frown',
        2 => 'fas fa-frown-open',
        3 => 'fas fa-meh',
        4 => 'fas fa-smile',
        5 => 'fa fa-light fa-laugh-beam'
    ];

    function __construct()
    {
        $this->middleware('permission:survei-pertanyaan-index|survei-pertanyaan-create|survei-pertanyaan-edit|survei-pertanyaan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:survei-pertanyaan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:survei-pertanyaan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:survei-pertanyaan-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request, SurveiPertanyaanDataTable $dataTables)
    {
        return $dataTables->render('admin.survei.pertanyaanIndex', compact('request'));
    }

    public function create()
    {
        $questionNo = SurveyQuestion::where('id_period', session('id_period'))->max('sorting');
        return view('admin.survei.pertanyaanCreate', compact('questionNo'));
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori' => 'required|max:100',
            'pertanyaan' => 'required|max:255',
            'id_period' => 'required',
            'type_jawaban' => 'required|max:100',
            'sorting' => 'required',
            'jawaban_1' => 'required_if:type_jawaban,==,options|string',
            'jawaban_2' => 'required_if:type_jawaban,==,options|string',
            'jawaban_3' => 'required_if:type_jawaban,==,options|string',
            'jawaban_4' => 'required_if:type_jawaban,==,options|string',
            'jawaban_5' => 'required_if:type_jawaban,==,options|string',
        ];
        $this->validate($request, $rules);
        $question = new SurveyQuestion();
        $question->pertanyaan = $request->pertanyaan;
        $question->kategori = $request->kategori;
        $question->type_jawaban = $request->type_jawaban;
        $question->sorting = $request->sorting;
        $question->id_period = $request->id_period;
        $question->status = isset($request->status) ? 1 : 0;

        if ($question->save()) {
            $nilai = 5;
            for ($i = 1; $i <= 5; $i++) {
                SurveyAnswer::create([
                    'jawaban' => $request->input('jawaban_' . $i),
                    'question_id' => $question->id,
                    'nilai' => $nilai,
                    'sorting' => $i,
                    'color' => $this->colors[$i],
                    'icon' => $this->icons[$i],
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => auth()->user()->name
                ]);
                $nilai--;
            }
        }
        $notification =  trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.survei-pertanyaan.index')->with($notification);
    }

    public function edit($id)
    {
        $category = SurveyQuestion::findOrFail($id);
        return view('admin.survei.pertanyaanEdit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kategori' => 'required|max:100',
            'pertanyaan' => 'required|max:255',
            'id_period' => 'required',
            'type_jawaban' => 'required|max:100',
            'sorting' => 'required',
            'jawaban_1' => 'required_if:type_jawaban,==,options|string',
            'jawaban_2' => 'required_if:type_jawaban,==,options|string',
            'jawaban_3' => 'required_if:type_jawaban,==,options|string',
            'jawaban_4' => 'required_if:type_jawaban,==,options|string',
            'jawaban_5' => 'required_if:type_jawaban,==,options|string',
        ];
        $this->validate($request, $rules);
        $question = SurveyQuestion::findOrFail($id);
        $question->pertanyaan = $request->pertanyaan;
        $question->kategori = $request->kategori;
        $question->type_jawaban = $request->type_jawaban;
        $question->sorting = $request->sorting;
        $question->id_period = $request->id_period;
        $question->status = isset($request->status) ? 1 : 0;
        if ($question->save()) {
            SurveyAnswer::where('question_id', $id)->delete();
            $nilai = 5;
            for ($i = 1; $i <= 5; $i++) {
                SurveyAnswer::create([
                    'jawaban' => $request->input('jawaban_' . $i),
                    'question_id' => $question->id,
                    'nilai' => $nilai,
                    'sorting' => $i,
                    'color' => $this->colors[$i],
                    'icon' => $this->icons[$i],
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => auth()->user()->name
                ]);
                $nilai--;
            }
        }
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.survei-pertanyaan.index')->with($notification);
    }

    public function destroy($id)
    {
        SurveyQuestion::findOrFail($id)->delete();
        return response([
            'status' => 'success',
        ]);
    }
}
