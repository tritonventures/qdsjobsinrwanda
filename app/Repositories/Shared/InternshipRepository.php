<?php

namespace App\Repositories\Shared;

use App\Models\Shared\Internship;
use App\Repositories\BaseRepository;

/**
 * Class InternshipRepository
 * @package App\Repositories\Shared
 * @version October 6, 2021, 12:43 pm UTC
*/

class InternshipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'company_id',
        'location',
        'is_employed',
        'is_active',
        'created_by',
        'nationality_id',
        'proffession_id',
        'experience_id',
        'education_id',
        'salary_id'
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
        return Internship::class;
    }
}
