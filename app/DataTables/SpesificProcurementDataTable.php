<?php

namespace App\DataTables;

use App\Models\SpesificProcurement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class SpesificProcurementDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.procurements.spesific.actions')
            ->addColumn('important_date', function (SpesificProcurement $spesificProcurement) {
                $dateOfPublication = Carbon::parse($spesificProcurement->date_of_publication)->format('Y-m-d');
                $lastSubmissionDateTime = $spesificProcurement->updated_at->format('Y-m-d H:i:s');

                return "First Date of Publication: <br> <b>{$dateOfPublication}</b> <br>
                        Last Submission Date/Time: <br> <b>{$lastSubmissionDateTime}</b>";
            })
            ->editColumn('title', fn (SpesificProcurement $spesificProcurement) => Str::limit($spesificProcurement->title, 50))
            ->editColumn('status', function (SpesificProcurement $spesificProcurement) {
                $status = $spesificProcurement->status ?? 'draft';
                $badge = match ($status) {
                    'open' => 'badge-success',
                    'close' => 'badge-danger',
                    default => 'badge-warning',
                };

                return "<span class='badge {$badge}'>" . ucfirst($status) . "</span>";
            })
            ->editColumn('files', 'admin.procurements.spesific.list_file')
            ->addIndexColumn()
            ->rawColumns(['important_date', 'title', 'status', 'action', 'files']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SpesificProcurement $model): QueryBuilder
    {
        return $model->newQuery()->with('files');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('spesificprocurement-table')
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
                            var table = window.LaravelDataTables["spesificprocurement-table"];
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
            Column::make('title')->title('Title & ID'),
            Column::make('important_date')->title('Important Date')
                ->orderable(false)
                ->searchable(false),
            Column::make('status')->title('Status'),
            Column::make('files')->title('Issued Documents')
                ->orderable(false)
                ->searchable(false),
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
        return 'SpesificProcurement_' . date('YmdHis');
    }
}
