<?php

namespace App\DataTables;

use App\Models\MudikSaran;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SaranDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($row) {
                return $row->created_at ?? date('d M Y H:i', strtotime($row->created_at));
            })
            ->rawColumns(['created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MudikSaran $model)
    {
        $query =  $model->newQuery();
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
            ->setTableId('survei-saran-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('reset'),
                Button::make('export')
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
            Column::make('phone_number')->title('Nomor Telepon')->width(100),
            Column::make('created_at')->title('Tanggal Input')->width(150),
            Column::make('saran')->title('Saran'),
            Column::make('masukan')->title('Masukan')
            // ->exportable(true)
            // ->printable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SurveiSaranMasukan_' . date('YmdHis');
    }
}
