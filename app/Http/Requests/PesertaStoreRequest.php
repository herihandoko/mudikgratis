<?php

namespace App\Http\Requests;

use App\Rules\EmailRegisterRule;
use Illuminate\Foundation\Http\FormRequest;

class PesertaStoreRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]{9,15}$/',
                'min:8',
                'max:15',
            ],
            'no_kk' => [
                'required',
                'string',
                'min:16',
                'max:16',
            ],
            'nik' => [
                'required',
                'string',
                'min:16',
                'max:16',
            ],
            'tujuan_id' => ['required'],
            'kota_tujuan_id' => ['required'],
            'jumlah' => [
                'required',
                'numeric',
                'min:1',
                'max:4',
            ],
            'tgl_lahir' => 'required|date_format:Y-m-d|before:today',
            'tempat_lahir' =>  'required|max:255',
        ];
    }
}
