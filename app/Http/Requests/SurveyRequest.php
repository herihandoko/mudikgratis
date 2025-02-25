<?php

namespace App\Http\Requests;

use App\Models\MudikPeriod;
use App\Models\SurveyQuestion;
use App\Rules\SurveyPhoneRule;
use App\Rules\SurveyRule;
use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'phone_number' => ['required', 'regex:/^[0-9]{9,15}$/', new SurveyPhoneRule(), new SurveyRule()],
            'jawaban' => 'required|array',
            'saran' => 'nullable|max:255',
            'masukan' => 'nullable|max:255'
        ];
        $period = MudikPeriod::select('id')->where('status', 'active')->first();
        $questions = SurveyQuestion::with('answers')->where('status', 1)->where('id_period', $period->id)->orderBy('sorting', 'asc')->get();
        foreach ($questions as $key => $value) {
            $rules['jawaban.' . $value->id] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Nomor telepon wajib diisi .',
            'phone_number.regex' => 'Format nomor telepon tidak sesuai.',
            'jawaban.*.required' => 'Jawaban tidak boleh kosong.',
        ];
    }
}
