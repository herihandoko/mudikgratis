<?php

namespace App\Rules;

use App\Models\Correspondent;
use App\Models\MudikPeriod;
use Illuminate\Contracts\Validation\Rule;

class SurveyRule implements Rule
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
        $correspondent = Correspondent::where('phone_number', $value)->where('id_period', $period->id)->first();
        if ($correspondent) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Anda sudah pernah melakukan survei.';
    }
}
