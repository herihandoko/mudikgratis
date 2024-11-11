<?php

namespace App\DataTables;

use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanProvinsi;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MudikProvinsiDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('tujuan', function ($row) {
                return isset($row->tujuan->name) ? $row->tujuan->name : '-';
            })
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-provinsi.edit',  $action->id),
                        'permission' => 'mudik-provinsi-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-provinsi.destroy', $action->id),
                        'permission' => 'mudik-provinsi-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('status', function ($status) {
                if ($status->status !== 'active') {
                    return '<div class="btn btn-danger btn-sm"> ' . $status->status . ' </div>';
                } else return '<div class="btn btn-secondary btn-sm"> ' . $status->status . ' </div>';
            })
            ->rawColumns(['action', 'tujuan', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikTujuanProvinsi $model)
    {
        $query = $model->where('id_period', session('id_period'))->newQuery();
        if ($this->request()->get("tujuan_id")) {
            $query->where('tujuan_id', $this->request()->get("tujuan_id"));
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
            ->setTableId('mudik-provinsi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create')->action("window.location = '" . route('admin.mudik-provinsi.create') . "';"),
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
            Column::make('tujuan')->width(100),
            Column::make('name')->width(100),
            Column::make('status')->width(10),
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
