<?php

namespace App\DataTables;

use App\Models\Director;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DirectorDataTable extends DataTable
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
                return '<a href="' . route('admin.bod.director.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="' . route('admin.bod.director.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('designation', fn ($query) => $query->designation->designation)
            ->setRowId('id')
            ->rawColumns(['image', 'action',]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Director $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Director $model): QueryBuilder
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
            ->setTableId('director-table')
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
            Column::make('image')->width(20)->title('Picture'),
            Column::make('name')->width(20)->title('Name'),
            Column::make('designation')->width(20)->title('Designation'),
            Column::make('description')->width(20)->title('Description'),
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
        return 'Director_' . date('YmdHis');
    }
}
