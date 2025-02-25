<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Models\Correspondent;
use App\Models\CorrespondentHasAnswer;
use App\Models\MudikPeriod;
use App\Models\MudikSaran;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Models\User;
use App\Services\NotificationApiService;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    //
    public function index(Request $request)
    {
        $period = MudikPeriod::select('id')->where('status', 'active')->first();
        $questions = SurveyQuestion::with('answers')->where('status', 1)->where('id_period', $period->id)->orderBy('sorting', 'asc')->get();
        return view('frontend.surveyIndex', compact('questions', 'request'));
    }

    public function store(SurveyRequest $surveyRequest, NotificationApiService $notificationService)
    {
        $pesertaMudik = User::where('phone', $surveyRequest->phone_number)->first();
        $period = MudikPeriod::select('id')->where('status', 'active')->first();
        $correspondent = Correspondent::create([
            'uuid' => $pesertaMudik->uuid ?? null,
            'phone_number' => $surveyRequest->phone_number,
            'id_period' => $period->id,
            'id_user' => $pesertaMudik->id ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $pesertaMudik->name  ?? null,
        ]);
        MudikSaran::create([
            'phone_number' => $surveyRequest->phone_number,
            'masukan' => $surveyRequest->masukan,
            'saran' => $surveyRequest->saran,
        ]);
        if ($correspondent) {
            $jawaban = $surveyRequest->jawaban;
            foreach ($jawaban as $key => $value) {
                $answer = SurveyAnswer::find($value);
                CorrespondentHasAnswer::create([
                    'id_correspondent' => $correspondent->id,
                    'id_question' => $key,
                    'id_answer' => $value,
                    'nilai' => $answer->nilai,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $pesertaMudik->name ?? null,
                    'id_period' => $period->id,
                ]);
            }
            $param = [
                'target' => $surveyRequest->phone_number,
                'message' => "[Jawara Mudik] - *Terima kasih telah berpartisipasi!* Kami menghargai waktu Anda untuk mengisi Survei Kepuasan Masyarakat Program Mudik Gratis. Pendapat Anda sangat penting untuk peningkatan layanan kami"
            ];
            $notificationService->sendNotification($param);
        }
        return redirect()->back()->with('success', '<b>Survei Anda berhasil dikirim!</b> Terima kasih atas kontribusi Anda dalam Survei Kepuasan Masyarakat Program Mudik Gratis.');
    }
}
