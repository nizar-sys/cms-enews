<?php

namespace App\DataTables;

use App\Models\PressRelease;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PressReleaseDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                return '<div class="d-flex justify-content-center">
                            <a href="' . route('admin.press-release.edit', $query->id) . '" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>
                            <a href="' . route('admin.press-release.destroy', $query->id) . '" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                        </div>';
            })
            ->editColumn('file_path', function ($pressRelease) {
                if (!$pressRelease->file_path) {
                    return __('app.No files found');
                }

                $url = route('download.uploads', [
                    'file' => $pressRelease->file_path,
                    'model' => get_class($pressRelease),
                    'id' => $pressRelease->id
                ]);

                return sprintf(
                    '<a target="_blank" href="%s" class="btn btn-sm btn-danger"><i class="fas fa-file"></i> View</a>',
                    $url
                );
            })
            ->rawColumns(['action', 'file_path']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PressRelease $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('press-release-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
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
                            'columns' => [0, 1, 2],
                        ],
                        'sheetName' => $this->filename(),
                    ],

                    [
                        'extend' => 'pdf',
                        'text' => '<i class="fas fa-file-pdf"></i>',
                        'className' => 'btn btn-sm ml-1 btn-danger',
                        'exportOptions' => [
                            'columns' => [0, 1, 2],
                        ],
                        'filename' => $this->filename(),
                    ],

                    [
                        'text' => '<i class="fas fa-sync"></i>',
                        'className' => 'btn btn-sm ml-1 btn-info',
                        'action' => 'function(){
                            var table = window.LaravelDataTables["documentfile-table"];
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
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('file_name'),
            Column::make('file_path'),
            Column::make('file_downloaded')->title('Count File Downloaded'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Actions')
                ->orderable(false)
                ->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PressRelease_' . date('YmdHis');
    }
}
