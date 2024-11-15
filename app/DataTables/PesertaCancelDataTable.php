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
            ->editColumn('sent_at', function ($row) {
                return date('d/m/Y H:i', strtotime($row->sent_at));
            })
            ->rawColumns(['sent_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PesertaCancelled $model)
    {
        $query = $model->where('periode_id', session('id_period'))->newQuery();
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
            Column::make('id')->title('Id')->width(10),
            Column::make('nama_lengkap')->title('Nama Lengkap')->width(100),
            Column::make('nik')->title('Nik')->width(100),
            Column::make('tgl_lahir')->title('Tgl. Lahir')->width(100),
            Column::make('jenis_kelamin')->title('Jenis Kelamin')->width(100),
            Column::make('reason')->title('Alasan')->width(100),
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
