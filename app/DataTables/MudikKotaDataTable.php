<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\MudikTujuan;
use App\Models\MudikTujuanKota;
use App\Models\MudikTujuanProvinsi;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MudikKotaDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('provinsi', function ($row) {
                return $row->provinsi->name;
            })
            ->addColumn('jumlah_bus', function ($row) {
                return $row->bus->count();
            })
            ->addColumn('jumlah_kursi', function ($row) {
                return $row->bus->sum('jumlah_kursi');
            })
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.mudik-kota.edit',  $action->id),
                        'permission' => 'mudik-kota-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.mudik-kota.destroy', $action->id),
                        'permission' => 'mudik-kota-delete',
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
            ->rawColumns(['action', 'provinsi', 'jumlah_bus', 'status', 'jumlah_kursi']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikTujuanKota $model)
    {
        $query = $model->newQuery();
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
            ->setTableId('mudik-kota-table')
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
            Column::make('provinsi')->width(100),
            Column::make('name')->title('Kota')->width(100),
            Column::make('jumlah_bus')->title('Jumlah Bus')->width(100),
            Column::make('jumlah_kursi')->title('Jumlah Kursi')->width(100),
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
