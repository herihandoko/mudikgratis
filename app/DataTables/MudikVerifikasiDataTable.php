<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MudikVerifikasiDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status_mudik', function ($status) {
                if ($status->status_mudik == 'dikirim') {
                    return '<div class="btn btn-warning btn-sm"> Menunggu Verifikasi </div>';
                } elseif ($status->status_mudik == 'ditolak') {
                    return '<div class="btn btn-danger btn-sm"> Di Tolak </div>';
                } else return '<div class="btn btn-success btn-sm"> Terverifikasi </div>';
            })
            ->addColumn('jumlah_peserta', function ($row) {
                return $row->peserta->count();
            })
            ->addColumn('kota_tujuan', function ($row) {
                return $row->KotaTujuan->name;
            })
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-verifikasi.edit',  $action->id),
                        'permission' => 'mudik-verifikasi-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-verifikasi.destroy', $action->id),
                        'permission' => 'mudik-verifikasi-delete',
                    ],
                    'print' => [
                        'link' => route('admin.mudik-verifikasi.cetak', $action->id),
                        'permission' => 'mudik-verifikasi-index',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->rawColumns(['action', 'status_mudik']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $query =  $model->where('status_mudik', 'dikirim')->newQuery();
        if ($this->request()->get("kota_tujuan_id")) {
            $query->where('kota_tujuan', $this->request()->get("kota_tujuan_id"));
        }
        if ($this->request()->get("tujuan_id")) {
            $query->where('tujuan', $this->request()->get("tujuan_id"));
        }
        if ($this->request()->get("status_mudik")) {
            $query->where('status_mudik', $this->request()->get("status_mudik"));
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
            ->setTableId('blogcategory-table')
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
            Column::make('name')->width(100),
            Column::make('email')->width(100),
            Column::make('phone')->width(100),
            Column::make('kota_tujuan')->width(100),
            Column::make('jumlah_peserta')->width(100),
            Column::make('status_mudik')->width(200),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
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
