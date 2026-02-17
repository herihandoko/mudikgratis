<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UserKkRule implements Rule
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
        $noKk = trim((string) $value);
        return ! User::where('no_kk', $noKk)->where('periode_id', $this->idPeriode)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Maaf nomor kartu keluarga sudah terdaftar';
    }
}
