<?php

namespace App\DataTables;

use App\Models\Director;
use App\Models\JobList;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobListDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($query) {
                return '<img style="width:70px" src="' . asset($query->image) . '"></img>';
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.job-lists.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="' . route('admin.job-lists.destroy', $query->id) . '   " class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('filepath', function ($query) {
                return '<a href="' . $query->filepath . '" target="_blank" class="btn btn-sm btn-danger">View</a>';
            })
            ->setRowId('id')
            ->rawColumns(['action', 'filepath']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JobList $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JobList $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('job-list-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('position')->width(20)->title('Position'),
            Column::make('filename')->width(20)->title('File Name'),
            Column::make('filepath')->width(20)->title('File Path'),
            Column::make('vacancy_deadline')->width(20)->title('Vacancy Deadline'),
            Column::make('current_status')->width(20)->title('Current Status'),
            Column::computed('action')->width(5)
                ->exportable(false)
                ->printable(false)
                ->width(10)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'JobList_' . date('YmdHis');
    }
}
