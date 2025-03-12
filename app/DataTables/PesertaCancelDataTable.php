<?php

namespace App\DataTables;

use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PesertaCancelDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
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
            ->rawColumns([ 'action', 'status_mudik', 'sent_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PesertaCancelled $model)
    {
        $query = $model->with('KotaTujuan')
            ->where('periode_id', session('id_period'))
            ->newQuery();
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
            ->setTableId('hist-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('reset'),
                Button::make('export')
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
            Column::make('nik')->title('NOMOR INDUK KEPENDUDUKAN (NIK)')->width(100),
            Column::make('nama_lengkap')->title('NAMA LENGKAP (SESUAI KTP/KK)')->width(100),
            Column::make('jenis_kelamin')->title('JENIS KELAMIN')->width(100),
            Column::make('kota_tujuan')->title('KOTA TUJUAN')->width(100),
            Column::make('nomor_kursi')->title('NOMOR KURSI')->width(100),
            Column::make('status')->title('STATUS')->width(100),
            Column::make('reason')->title('KET.')->width(100),
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
