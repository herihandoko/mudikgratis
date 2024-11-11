<?php

namespace App\Rules;

use App\Models\Correspondent;
use App\Models\MudikPeriod;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class SurveyPhoneRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $period = MudikPeriod::select('id')->where('status', 'active')->first();
        $user = User::where('phone', $value)->where('periode_id', $period->id)->first();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nomor telpon anda tidak terdaftar sebagai peserta mudik.';
    }
}
