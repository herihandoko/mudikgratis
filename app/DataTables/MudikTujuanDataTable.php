<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MudikTujuanDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-tujuan.edit',  $action->id),
                        'permission' => 'mudik-tujuan-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-tujuan.destroy', $action->id),
                        'permission' => 'mudik-tujuan-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('id_period', function ($row) {
                return $row->period->name ?? '-';
            })
            ->addColumn('status', function ($status) {
                if ($status->status !== 'active') {
                    return '<div class="btn btn-danger btn-sm"> ' . $status->status . ' </div>';
                } else return '<div class="btn btn-secondary btn-sm"> ' . $status->status . ' </div>';
            })
            ->rawColumns(['action', 'status', 'id_period']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikTujuan $model)
    {
        $query =  $model->where('id_period', session('id_period'))->newQuery();
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
            ->setTableId('mudik-tujuan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                // Button::make('create'),
                Button::make('create')
                    ->text('<i class="fa fa-plus"></i> Tambah Tujuan')
                    ->action('function() { window.location.href = "' . route('admin.mudik-tujuan.create') . '" }'),
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
            Column::make('name')->title('Tujuan')->width(100),
            Column::make('status')->width(10),
            Column::make('id_period')->title('Period')->width(100),
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
        return 'MudikTujuan_' . date('YmdHis');
    }
}
