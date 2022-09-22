<?php

namespace App\DataTables\Admin;

use App\Models\Admin\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $query =   $model->newQuery()->where('user_type', "candidate");
        return $this->handleFilters($query);
    }

    private function handleFilters($query)
    {
        if (session()->has("filters.experience")) $query->WhereHas("experiences",  function ($q) {
            $q->where('listing_id', session("filters.experience"));
        });

        if (session()->has("filters.education")) $query->WhereHas("educations",  function ($q) {
            $q->where('education_id', session("filters.education"));
        });

        if (session()->has("filters.language")) $query->WhereHas("languages",  function ($q) {
            $q->where('language_id', session("filters.language"));
        });

        if (session()->has("filters.gender")) $query->where("gender_id", session("filters.gender"));

        if (session()->has("filters.nationality")) $query->where("nationality_id", session("filters.nationality"));

        if (session()->has("filters.proffession")) $query->where("proffession_id", session("filters.proffession"));

        if (session()->has("filters.salary")) $query->where("salary_id", session("filters.salary"));

        return $query->with(["proffession"]);
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
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'candidatesFilter', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'names',
            'email',
            ['name' => "phone_number", "data" => "phone_number", "title" => "Phone"],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
