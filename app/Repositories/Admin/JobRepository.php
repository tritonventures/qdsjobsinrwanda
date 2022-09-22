<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Job;
use App\Repositories\BaseRepository;

/**
 * Class JobRepository
 * @package App\Repositories\Admin
 * @version July 29, 2021, 11:26 am UTC
*/

class JobRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'company_id',
        'location',
        'nationality_id',
        'proffession_id',
        'language_id',
        'is_employed',
        'is_active',
        'experience_id',
        'education_id',
        'salary_id',
        'created_by'
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
        return Job::class;
    }
}
