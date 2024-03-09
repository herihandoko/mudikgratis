<?php

namespace App\Rules;

use App\Models\MudikTujuanKota;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class KuotaRule implements Rule
{
    public $kotaTujuanId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($kotaTujuanId)
    {
        //
        $this->kotaTujuanId = $kotaTujuanId;
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
        $totalRegister = User::where('kota_tujuan', $this->kotaTujuanId)->sum('jumlah');
        $kotaTujuan = MudikTujuanKota::find($this->kotaTujuanId);
        $totalKuota = $kotaTujuan->bus->sum('jumlah_kursi');
        if (($totalKuota  - $totalRegister) < $value) {
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
        return 'Maaf kuota untuk Kota Tujuan tersebut sudah penuh';
    }
}
