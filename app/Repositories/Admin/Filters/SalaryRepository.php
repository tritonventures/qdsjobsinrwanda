<?php

namespace App\Repositories\Admin\Filters;

use App\Models\Admin\Filters\Salary;
use App\Repositories\BaseRepository;

/**
 * Class SalaryRepository
 * @package App\Repositories\Admin\Filters
 * @version July 24, 2021, 12:45 pm UTC
*/

class SalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'min',
        'max'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Salary::class;
    }
}
