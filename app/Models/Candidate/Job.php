<?php

namespace App\Models\Candidate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Job
 * @package App\Models\Candidate
 * @version July 24, 2021, 1:59 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $company
 * @property string $location
 * @property string $nationality_id
 * @property string $proffession_id
 * @property string $language_id
 * @property boolean $is_active
 * @property string $experience_id
 * @property string $education_id
 * @property string $salary_id
 */
class Job extends Model
{
    use SoftDeletes;


    public $table = 'jobs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'company' => 'string',
        'location' => 'string',
        'nationality_id' => 'string',
        'proffession_id' => 'string',
        'language_id' => 'string',
        'is_active' => 'boolean',
        'experience_id' => 'string',
        'education_id' => 'string',
        'salary_id' => 'string',
        'deadline' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'nationality_id' => 'nullable|string|max:255',
        'proffession_id' => 'nullable|string|max:255',
        'language_id' => 'nullable|string|max:255',
        'is_active' => 'nullable|boolean',
        'experience_id' => 'nullable|string|max:255',
        'education_id' => 'nullable|string|max:255',
        'salary_id' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
}
