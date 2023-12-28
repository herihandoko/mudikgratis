<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\Bus;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\MudikTujuanProvinsi;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MudikBusDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            // ->addColumn('provinsi', function ($row) {
            //     return $row->provinsi->name;
            // })
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-verifikasi.edit',  $action->id),
                        'permission' => 'blog-category-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-verifikasi.destroy', $action->id),
                        'permission' => 'blog-category-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bus $model)
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
            ->setTableId('blogcategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                // Button::make('create'),
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
            Column::make('name')->width(100),
            Column::make('jumlah_kursi')->width(100),
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
