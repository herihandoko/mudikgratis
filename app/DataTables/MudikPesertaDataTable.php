<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\Peserta;
use App\Models\User;
use App\Models\UserInactive;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MudikPesertaDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('no_kk', function ($row) {
                return $row->profile->no_kk;
            })
            ->addColumn('phone', function ($row) {
                return $row->profile->phone;
            })
            ->addColumn('alamat', function ($row) {
                return $row->profile->address->address;
            })
            ->editColumn('jenis_kelamin', function ($row) {
                if ($row->jenis_kelamin == 'L') {
                    return 'Laki-Laki';
                } else {
                    return 'Perempuan';
                }
            })
            ->addColumn('action', function ($action) {
                $button = [
                    'delete' => [
                        'link' => route('admin.mudik-report.destroy', $action->id),
                        'permission' => 'mudik-report-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('kota_tujuan', function ($row) {
                return $row->KotaTujuan->name;
            })
            ->rawColumns(['no_kk', 'action', 'status_mudik', 'alamat', 'phone']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Peserta $model)
    {
        $query = $model->with('KotaTujuan')->newQuery();
        if ($this->request()->get("periode_id")) {
            $query->where('periode_id', $this->request()->get("periode_id"));
        }
        if ($this->request()->get("kota_tujuan_id")) {
            $query->where('kota_tujuan_id', $this->request()->get("kota_tujuan_id"));
        }
        if ($this->request()->get("nomor_bus")) {
            $query->where('nomor_bus', $this->request()->get("nomor_bus"));
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('mudik-peserta-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('reset')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('ID')->width(10),
            Column::make('no_kk')->title('NOMOR KARTU KELUARGA')->width(100),
            Column::make('nik')->title('NOMOR INDUK KEPENDUDUKAN (NIK)')->width(100),
            Column::make('nama_lengkap')->title('NAMA LENGKAP (SESUAI KTP/KK)')->width(100),
            Column::make('alamat')->title('ALAMAT (SESUAI KTP/KK)')->width(100),
            Column::make('jenis_kelamin')->title('JENIS KELAMIN')->width(100),
            Column::make('phone')->title('NO TELEPON/HP (WA AKTIF)')->width(100),
            Column::make('kota_tujuan')->title('KOTA TUJUAN')->width(100),
            Column::make('nomor_kursi')->title('NOMOR KURSI')->width(100),
            Column::make('status')->title('STATUS')->width(100),
            Column::make('reason')->title('KET')->width(100),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'MudikVerifikasi_' . date('YmdHis');
    }
}
