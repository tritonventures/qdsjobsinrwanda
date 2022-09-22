<?php

namespace App\Models\Admin;

use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\Shared\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


/**
 * Class Job
 * @package App\Models\Admin
 * @version July 29, 2021, 11:26 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $company
 * @property string $location
 * @property string $nationality_id
 * @property string $proffession_id
 * @property string $language_id
 * @property boolean $is_employed
 * @property boolean $is_active
 * @property string $experience_id
 * @property string $education_id
 * @property string $salary_id
 * @property string $created_by
 */
class Job extends Model
{
    use SoftDeletes, CascadeSoftDeletes;


    public $table = 'jobs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = [];



    public $fillable = [
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
        'created_by',
        'deadline'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'company_id' => 'string',
        'location' => 'string',
        'nationality_id' => 'string',
        'proffession_id' => 'string',
        'language_id' => 'string',
        'is_employed' => 'boolean',
        'is_active' => 'boolean',
        'experience_id' => 'string',
        'education_id' => 'string',
        'salary_id' => 'string',
        'created_by' => 'string',
        'deadline' => 'date:d-m-Y'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'bail|required|string|max:255',
        'description' => 'bail|required|string',
        'company_id' => 'bail|required|string|max:255',
        'location' => 'bail|nullable|string|max:255',
        'nationality_id' => 'bail|nullable|string|max:255',
        'proffession_id' => 'bail|nullable|string|max:255',
        'language_id' => 'bail|nullable|string|max:255',
        'is_employed' => 'bail|nullable|boolean',
        'is_active' => 'bail|nullable|boolean',
        'experience_id' => 'bail|nullable|string|max:255',
        'education_id' => 'bail|nullable|string|max:255',
        'salary_id' => 'bail|nullable|string|max:255',
        'created_by' => 'bail|nullable|string|max:255',
        'created_at' => 'bail|nullable',
        'deadline' => 'bail|required|date',
        'updated_at' => 'bail|nullable',
        'deleted_at' => 'bail|nullable'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'job_user');
    }
    public function approvedUsers()
    {
        return $this->belongsToMany(User::class, "approved_job_user");
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    public function education()
    {
        return $this->belongsTo(Education::class);
    }
    public function proffession()
    {
        return $this->belongsTo(Proffession::class);
    }
    public function experience()
    {
        return $this->belongsTo(ExperienceListing::class);
    }
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
