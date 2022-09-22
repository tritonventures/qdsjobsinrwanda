<?php

namespace App\Repositories\Admin;

use App\Models\Admin\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 * @version July 29, 2021, 5:49 pm UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'names',
        'email',
        'phone_number',
        'age',
        'dob',
        'user_type',
        'skills',
        'is_employed',
        'is_active',
        'language_id',
        'gender_id',
        'nationality_id',
        'proffession_id',
        'experience_id',
        'education_id',
        'salary_id',
        'email_verified_at',
        'password',
        'remember_token'
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
        return User::class;
    }
}
