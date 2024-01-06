<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPeserta implements FromCollection, WithHeadings
{
    protected $request;
    function __construct($request)
    {
        $this->request = $request;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $peserta = Peserta::select('id', 'nik', 'nama_lengkap', 'tgl_lahir', 'jenis_kelamin', 'kategori');
        if ($this->request->periode_id) {
            $peserta->where('periode_id', $this->request->periode_id);
        }
        if ($this->request->kota_tujuan_id) {
            $peserta->where('kota_tujuan_id', $this->request->kota_tujuan_id);
        }
        if ($this->request->nomor_bus) {
            $peserta->where('nomor_bus', $this->request->nomor_bus);
        }
        return $peserta->get();
    }

    public function headings(): array
    {
        return ["ID", "NIK", "NAMA", "TGL LAHIR", "JENIS KELAMIN", "KATEGORI"];
    }
}
