<?php

namespace App\DataTables;

use App\Models\DownloadLog;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DownloadLogDataTable extends DataTable
{
    /**
     * Builds the DataTable class.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('tender_name', function ($log) {
                return $log->tender->name;
            })
            ->addColumn('filename', function ($log) {
                return $log->file();
            })
            ->editColumn('created_at', function ($log) {
                return $log->created_at->format('d F Y H:i:s');
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DownloadLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DownloadLog $model)
    {
        // Select only necessary columns
        return $model->newQuery()
            ->with('tender');
    }

    /**
     * Optional method if you want to use the HTML builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('downloadlog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('frtip');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false),
            Column::make('tender_name')->title('Tender Name'),
            Column::make('filename')->title('Filename'),
            Column::make('created_at')->title('Downloaded At'),
        ];
    }
}
