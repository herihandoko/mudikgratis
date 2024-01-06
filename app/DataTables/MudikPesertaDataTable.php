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
            ->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Peserta $model)
    {
        $query = $model->newQuery();
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
            Column::make('id')->width(10),
            Column::make('nik')->width(100),
            Column::make('nama_lengkap')->width(100),
            Column::make('tgl_lahir')->width(100),
            Column::make('jenis_kelamin')->width(100),
            Column::make('kategori')->width(100)
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
