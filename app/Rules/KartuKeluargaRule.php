<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KartuKeluargaRule implements Rule
{
    public $tujuanId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tujuanId)
    {
        //
        $this->tujuanId = $tujuanId;
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
        if(($this->tujuanId == 1) && (substr(trim($value),0,2) != 36)){
            return false;
        }else{
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
        return 'Maaf untuk sementara, Mudik Bersama ini berlaku hanya untuk pendaftar yang berasal dari Provinsi Banten (Kartu Keluarga di Wilayah Propinsi Banten)';
    }
}
