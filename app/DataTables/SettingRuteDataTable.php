<?php

namespace App\DataTables;

use App\Models\MudikKotaHasRute;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SettingRuteDataTable extends DataTable
{
    protected $request;
    function __construct($request)
    {
        $this->request = $request;
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($action) {
                $button = [
                    'edit' => [
                        'link' => route('admin.setting-rute.edit',  [$action->id, 'tujuan_id' => $this->request->tujuan_id, 'kota_tujuan_id' => $this->request->kota_tujuan_id, 'search' => 1]),
                        'permission' => 'setting-rute-edit',
                    ],
                    'delete' => [
                        'link' => route('admin.setting-rute.destroy', $action->id),
                        'permission' => 'setting-rute-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->addColumn('name', function ($row) {
                return $row->kota->name ?? '-';
            })
            ->rawColumns(['action', 'name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikKotaHasRute $model)
    {
        return $model
            ->where('id_kota', $this->request->kota_tujuan_id)
            ->where('id_period', session('id_period'))
            ->orderBy('sorting', 'asc')
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $tableBuilder =  $this->builder()
            ->setTableId('setting-rute-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0);
        if ($this->request->kota_tujuan_id) {
            $tableBuilder->buttons(
                Button::make('create')->action("window.location = '" . route('admin.setting-rute.create', ['tujuan_id' => $this->request->tujuan_id, 'kota_tujuan_id' => $this->request->kota_tujuan_id, 'search' => 1]) . "';"),
                Button::make('reset')
            );
        } else {
            $tableBuilder->buttons(
                Button::make('reset')
            );
        }
        return $tableBuilder;
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
            Column::make('sorting')->title('Urutan')->width(100),
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
