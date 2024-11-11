<?php

namespace App\DataTables;

use App\Models\MudikPeriod;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MudikPeriodeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-periode.edit',  $action->id),
                        'permission' => 'mudik-periode-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-periode.destroy', $action->id),
                        'permission' => 'mudik-periode-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('status_pendaftaran', function ($status) {
                if ($status->status_pendaftaran !== 'open') {
                    return '<div class="btn btn-danger btn-sm"> ' . $status->status_pendaftaran . ' </div>';
                } else return '<div class="btn btn-success btn-sm"> ' . $status->status_pendaftaran . ' </div>';
            })
            ->addColumn('status', function ($status) {
                if ($status->status !== 'active') {
                    return '<div class="btn btn-danger btn-sm"> ' . $status->status . ' </div>';
                } else return '<div class="btn btn-secondary btn-sm"> ' . $status->status . ' </div>';
            })
            ->rawColumns(['action', 'status', 'status_pendaftaran']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikPeriod $model)
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
            ->setTableId('mudik-periode-table')
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
            Column::make('name')->title('Judul')->width(100),
            Column::make('start_date')->title('Tanggal Pembukaan')->width(100),
            Column::make('end_date')->title('Tanggal Penutupan')->width(100),
            Column::make('status_pendaftaran')->width(100),
            Column::make('status')->width(100),
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
