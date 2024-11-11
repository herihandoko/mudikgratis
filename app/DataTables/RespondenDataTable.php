<?php

namespace App\DataTables;

use App\Models\BlogCategory;
use App\Models\Correspondent;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\SurveyQuestion;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RespondenDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('id_period', function ($row) {
                return $row->period->name ?? '-';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ?? date('d M Y H:i', strtotime($row->created_at));
            })
            ->rawColumns(['id_period', 'created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Correspondent $model)
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
            ->setTableId('survei-respon-table')
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
            Column::make('phone_number')->title('Nomor Telepon'),
            Column::make('created_at')->title('Tanggal Input'),
            Column::make('id_period')->title('Period')->width(100)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SurveiPertanyaan_' . date('YmdHis');
    }
}
