<?php

namespace App\DataTables\Shared;

use App\Models\Shared\Tender;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TenderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'shared.tenders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tender $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tender $model)
    {
        return $model->newQuery()->with("company");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title',
            ['name' => "company.name", "data" => "company.name", "title" => "Company Name", "defaultContent" => "<center>-</center>"],
            'location',
            ['name' => "deadline", "data" => "deadline", "title" => "Deadline", "defaultContent" => "<center>-</center>"],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tenders_datatable_' . time();
    }
}
