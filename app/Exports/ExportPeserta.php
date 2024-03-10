<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Illuminate\Support\Carbon;

class ExportPeserta implements FromCollection, WithHeadings, WithEvents, WithMapping, WithColumnFormatting
{
    protected $request;
    protected $bus;
    protected $kota;
    private $rowNumber = 0;

    function __construct($request, $bus, $kota)
    {
        $this->request = $request;
        $this->bus = $bus;
        $this->kota = $kota;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $peserta = Peserta::select('id', 'nik', 'nama_lengkap', 'tgl_lahir', 'jenis_kelamin', 'kategori', 'user_id', 'nik', 'kota_tujuan_id', 'nomor_bus', 'status', 'reason','nomor_kursi');
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
        $created_at = isset($this->kota->tgl_keberangkatan) ? Carbon::parse($this->kota->tgl_keberangkatan) : "-";
        $formatted = isset($this->kota->tgl_keberangkatan) ? $created_at->translatedFormat('l, d F Y H:i') : "-";
        return [
            ["DAFTAR PESERTA MUDIK GRATIS BERSAMA PEMERINTAH PROVINSI BANTEN TAHUN 2024/1445H"],
            [isset($this->kota->name) ? strtoupper($this->kota->name . ', ' . $this->kota->provinsi->name) : "-"],
            ["Hari/Tanggal", $formatted],
            ["Bus", isset($this->bus->name) ? $this->bus->name : "-"],
            ["Pendamping", isset($this->bus->pendamping) ? $this->bus->pendamping : "-"],
            ["NO", "NOMOR KARTU KELUARGA", "NOMOR INDUK KEPENDUDUKAN (NIK)", "NAMA LENGKAP (SESUAI KTP/KK)", "ALAMAT (SESUAI KTP/KK)", "JENIS KELAMIN", "NO TELEPON/HP (WA AKTIF)", "KOTA/KAB", "NOMOR KURSI", "STATUS", "KET"]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('H')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('I')->setAutoSize(true);
                $event->sheet->getDelegate()->mergeCells('A1:K1');
                $event->sheet->getDelegate()->mergeCells('A2:K2');
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ];
                $event->sheet->getDelegate()->getStyle('A1:K1')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A2:K2')->applyFromArray($styleArray);

                $styleArray = [
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => Color::COLOR_BLACK],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF808080'], // ARGB value for gray
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('A6:K6')->applyFromArray($styleArray);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function map($row): array
    {
        $this->rowNumber++;
        $jnsKelamin = "";
        if ($row->jenis_kelamin == 'L') {
            $jnsKelamin = 'Laki-Laki';
        } else {
            $jnsKelamin =  'Perempuan';
        }
        return [
            $this->rowNumber, // This is the row index
            "\t" . $row->profile->no_kk,
            "\t" . $row->nik,
            isset($row->nama_lengkap) ? $row->nama_lengkap : "-",
            isset($row->profile->address->address) ? $row->profile->address->address : '-',
            $jnsKelamin,
            "\t" . $row->profile->phone,
            isset($row->KotaTujuan->name) ? $row->KotaTujuan->name : '-',
            isset($row->nomor_kursi) ? $row->nomor_kursi : '-',
            $row->status,
            $row->reason
        ];
    }
}
