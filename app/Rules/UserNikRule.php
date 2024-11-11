<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UserNikRule implements Rule
{
    public $idPeriode;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($idPeriode)
    {
        //
        $this->idPeriode = $idPeriode;
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
        $userExist = User::where('nik', $value)->where('periode_id', $this->idPeriode)->exists();
        if ($userExist) {
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
        return 'Maaf nomor NIK sudah terdaftar';
    }
}
