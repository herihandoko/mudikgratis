<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UserPhoneRule implements Rule
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
        $normalized = ltrim((string) $value, '0');
        $userExist = User::where('periode_id', $this->idPeriode)->get()->contains(function ($user) use ($normalized) {
            return ltrim($user->phone ?? '', '0') === $normalized;
        });
        return ! $userExist;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Maaf nomor telepon sudah terdaftar';
    }
}
