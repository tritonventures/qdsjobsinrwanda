<?php

namespace App\Repositories\Admin\Filters;

use App\Models\Admin\Filters\Nationality;
use App\Repositories\BaseRepository;

/**
 * Class NationalityRepository
 * @package App\Repositories\Admin\Filters
 * @version July 24, 2021, 12:43 pm UTC
*/

class NationalityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Nationality::class;
    }
}
