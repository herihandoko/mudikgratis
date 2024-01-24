<?php

namespace App\DataTables;

use App\Models\Peserta;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MudikPenggunaDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status_profile', function ($row) {
                if ($row->status_profile == 1) {
                    return '<div class="btn btn-success btn-sm">Lengkap</div>';
                } else {
                    return '<div class="btn btn-danger btn-sm">Belum Lengkap</div>';
                }
            })
            ->editColumn('jenis_kelamin', function ($row) {
                if ($row->gender == 'L') {
                    return 'Laki-Laki';
                } else {
                    return 'Perempuan';
                }
            })
            ->addColumn('jumlah_peserta', function ($row) {
                return $row->peserta->count();
            })
            ->addColumn('action', function ($action) {
                $button = [
                    'delete' => [
                        'link' => route('admin.mudik-pengguna.destroy', $action->id),
                        'permission' => 'mudik-pengguna-delete',
                    ]
                ];
                $button = json_decode(json_encode($button), FALSE);
                return view('admin.layouts.datatableButtons', compact('button'));
            })
            ->rawColumns(['status_profile', 'action', 'jumlah_peserta']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('mudik-pengguna-table')
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
            Column::make('id')->title('ID')->width(10),
            Column::make('no_kk')->title('NOMOR KARTU KELUARGA')->width(100),
            Column::make('nik')->title('NOMOR INDUK KEPENDUDUKAN (NIK)')->width(100),
            Column::make('name')->title('NAMA LENGKAP (SESUAI KTP/KK)')->width(100),
            Column::make('phone')->title('NOMOR TELEPON/HP (WA AKTIF)')->width(100),
            Column::make('status_profile')->title('STATUS PROFILE')->width(100),
            Column::make('status_mudik')->title('STATUS MUDIK')->width(100),
            Column::make('jumlah_peserta')->title('JUMLAH PESERTA')->width(100),
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
