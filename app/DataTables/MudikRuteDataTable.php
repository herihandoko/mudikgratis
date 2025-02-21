<?php

namespace App\DataTables;

use App\Models\MudikPeriod;
use App\Models\MudikRute;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MudikRuteDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-rute.edit',  $action->id),
                        'permission' => 'mudik-rute-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-rute.destroy', $action->id),
                        'permission' => 'mudik-rute-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('is_rute', function ($status) {
                if ($status->is_rute == 1) {
                    return '<div class="btn btn-success btn-sm"> Ya </div>';
                } else return '<div class="btn btn-danger btn-sm"> Tidak </div>';
            })
            ->addColumn('is_stop', function ($status) {
                if ($status->is_stop == 1) {
                    return '<div class="btn btn-success btn-sm"> Ya </div>';
                } else return '<div class="btn btn-danger btn-sm"> Tidak </div>';
            })
            ->rawColumns(['action', 'is_rute', 'is_stop']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikRute $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('mudik-rute-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
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
            Column::make('name')->title('Nama')->width(100),
            Column::make('is_rute')->title('Rute')->width(100),
            Column::make('is_stop')->title('Pemberhentian')->width(100),
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
        return 'MudikRute_' . date('YmdHis');
    }
}
