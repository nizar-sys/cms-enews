<?php

namespace App\DataTables;

use App\Models\PhotoProject;
use App\Models\PhotoProjectAlbum;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PhotoProjectDataTable extends DataTable
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
            ->addColumn('action', function ($query) {
                return '
                <div class="d-flex">
                    <a href="' . route('admin.photo-project.edit', $query->id) . '" class="btn btn-primary btn-sm me-2 mr-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="' . route('admin.photo-project.destroy', $query->id) . '" class="btn btn-danger btn-sm delete-item me-2">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            ';
            })
            ->addColumn('album_name', function ($photo) {
                return $photo->photoProjectAlbum->name;
            })
            ->editColumn('photo', function ($photo) {
                return '<a href="' . $photo->photo_path . '" target="_blank" class="btn btn-sm btn-danger">View</a>';
            })
            ->setRowId('id')
            ->rawColumns(['action', 'photo']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Designation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PhotoProject $model): QueryBuilder
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
            ->setTableId('photoproject-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'dom' => '<"row"<"col-md-6"B><"col-md-6"f>>' .
                    '<"row"<"col-md-6"l><"col-md-6">>' .
                    'rt' .
                    '<"row"<"col-md-5"i><"col-md-7"p>>',
                'buttons' => [
                    [
                        'extend' => 'excelHtml5',
                        'text' => '<i class="fas fa-file-excel"></i>',
                        'className' => 'btn btn-sm ml-1 btn-success',
                        'filename' => $this->filename(),
                        'exportOptions' => [
                            'columns' => [0, 1, 2, 3],
                        ],
                        'sheetName' => $this->filename(),
                    ],

                    [
                        'extend' => 'pdf',
                        'text' => '<i class="fas fa-file-pdf"></i>',
                        'className' => 'btn btn-sm ml-1 btn-danger',
                        'exportOptions' => [
                            'columns' => [0, 1, 2, 3],
                        ],
                        'filename' => $this->filename(),
                    ],

                    [
                        'text' => '<i class="fas fa-sync"></i>',
                        'className' => 'btn btn-sm ml-1 btn-info',
                        'action' => 'function(){
                                 var table = window.LaravelDataTables["project-table"];
                                 table.ajax.reload();
                                 table.search("").columns().search("").draw();
                             }',
                    ],

                ],
                'language' => [
                    'paginate' => [
                        'previous' => '&laquo;',
                        'next'     => '&raquo;',
                    ],
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('album_name'),
            Column::make('photo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */

    protected function filename(): string
    {
        return 'PhotoProject_' . date('YmdHis');
    }
}
