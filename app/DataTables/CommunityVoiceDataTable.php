<?php

namespace App\DataTables;

use App\Models\CommunityVoice;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CommunityVoiceDataTable extends DataTable {

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
             return '<a href="' . route('admin.community-voice.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                     <a href="' . route('admin.community-voice.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
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
        public function query(CommunityVoice $model): QueryBuilder
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
            ->setTableId('community_voice-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons([]
                // Button::make('create'),
                // Button::make('export'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
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
                Column::make('id'),
                Column::make('title'),
                Column::make('description'),
                Column::make('slug'),
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
            return 'CommunityVoice_' . date('YmdHis');
        }
}