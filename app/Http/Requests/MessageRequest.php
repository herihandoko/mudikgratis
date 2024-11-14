<?php

namespace App\Http\Requests;

use App\Models\MudikPeriod;
use App\Models\SurveyQuestion;
use App\Rules\SurveyPhoneRule;
use App\Rules\SurveyRule;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'target' => 'required',
            'phone_number' => ['nullable', 'regex:/^[0-9]{9,15}$/', 'required_if:target,input'],
            'message' => 'required|min:3|max:500',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Nomor telepon wajib diisi .',
            'phone_number.regex' => 'Format nomor telepon tidak sesuai.'
        ];
    }
}
