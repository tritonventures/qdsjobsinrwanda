<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate\Job;
use App\Repositories\BaseRepository;

/**
 * Class JobRepository
 * @package App\Repositories\Candidate
 * @version July 24, 2021, 1:59 pm UTC
*/

class JobRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'company',
        'location',
        'nationality_id',
        'proffession_id',
        'language_id',
        'is_active',
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
        return Job::class;
    }
}
