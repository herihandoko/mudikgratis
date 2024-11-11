<?php

namespace App\Rules;

use App\Models\MudikTujuanKota;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class KuotaRule implements Rule
{
    public $kotaTujuanId;
    public $idPeriode;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($kotaTujuanId, $idPeriode)
    {
        //
        $this->kotaTujuanId = $kotaTujuanId;
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
        $totalRegister = User::where('kota_tujuan', $this->kotaTujuanId)->where('periode_id', $this->idPeriode)->sum('jumlah');
        $kotaTujuan = MudikTujuanKota::where('id_period', $this->idPeriode)->where('id', $this->kotaTujuanId)->first();
        $totalKuota = $kotaTujuan ? $kotaTujuan->bus->sum('jumlah_kursi') : 0;
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
