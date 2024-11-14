<?php

namespace App\DataTables;

use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HistoryDataTable extends DataTable
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
    public function query(NotifHistory $model)
    {
        $query = $model->newQuery();
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
            Column::make('sent_at')->title('Time')->width(100),
            Column::make('recipient_number')->title('Target')->width(100),
            Column::make('message')->title('Message')->width(100),
            Column::make('status')->title('Status')->width(100),
            Column::make('delivered_at')->title('Delivered At')->width(100),
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
