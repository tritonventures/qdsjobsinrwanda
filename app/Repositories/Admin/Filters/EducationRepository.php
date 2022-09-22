<?php

namespace App\Repositories\Admin\Filters;

use App\Models\Admin\Filters\Education;
use App\Repositories\BaseRepository;

/**
 * Class EducationRepository
 * @package App\Repositories\Admin\Filters
 * @version July 24, 2021, 12:44 pm UTC
*/

class EducationRepository extends BaseRepository
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
        return Education::class;
    }
}
