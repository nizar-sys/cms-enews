<?php

namespace App\DataTables;

use App\Models\GeneralProcurement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GeneralProcurementDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.procurements.general.actions')
            ->addIndexColumn()
            ->editColumn('published_date', fn ($generalProcurement) => Carbon::parse($generalProcurement->published_date)->format('d/m/Y'))
            ->editColumn('file_path', function ($query) {
                if (!$query->file_path) {
                    return __('app.No files found');
                }

                $url = route('download.uploads', [
                    'file' => $query->file_path,
                    'model' => get_class($query),
                    'id' => $query->id
                ]);

                return sprintf(
                    '<a target="_blank" href="%s" class="btn btn-sm btn-danger"><i class="fas fa-file"></i> View</a>',
                    $url
                );
            })
            ->rawColumns(['title', 'file_path', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(GeneralProcurement $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('generalprocurement-table')
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
                            'columns' => [0, 1, 3, 4],
                        ],
                        'sheetName' => $this->filename(),
                    ],

                    [
                        'extend' => 'pdf',
                        'text' => '<i class="fas fa-file-pdf"></i>',
                        'className' => 'btn btn-sm ml-1 btn-danger',
                        'exportOptions' => [
                            'columns' => [0, 1, 3, 4],
                        ],
                        'filename' => $this->filename(),
                    ],

                    [
                        'text' => '<i class="fas fa-sync"></i>',
                        'className' => 'btn btn-sm ml-1 btn-info',
                        'action' => 'function(){
                            var table = window.LaravelDataTables["generalprocurement-table"];
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
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('title')->title('Title'),
            Column::make('category')->title('File Category'),
            Column::make('file_path')->title('Notice'),
            Column::make('file_downloaded')->title('Count File Downloaded'),
            Column::make('published_date')->title('Published Date'),
            Column::make('duration')->title('Duration'),
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
        return 'GeneralProcurement_' . date('YmdHis');
    }
}
