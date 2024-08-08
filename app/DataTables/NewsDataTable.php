<?php

namespace App\DataTables;

use App\Models\News;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable 
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
         ->editColumn('description', function ($query) {
             return substr($query->description, 0, 50) . '...';
         })
         ->addColumn('action', function ($query) {
             return '<a href="' . route('admin.news.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                     <a href="' . route('admin.news.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
         })
         ->setRowId('id')
         ->rawColumns(['action', 'description']);;
     }

     /**
      * Get query source of dataTable.
      *
      * @param \App\Models\Designation $model
      * @return \Illuminate\Database\Eloquent\Builder
      */
        public function query(News $model): QueryBuilder
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
                 ->setTableId('news-table')
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
                Column::make('title'),
                Column::make('description'),
                Column::make('created_at'),
                Column::make('updated_at'),
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
            return 'News_' . date('YmdHis');
        }
}