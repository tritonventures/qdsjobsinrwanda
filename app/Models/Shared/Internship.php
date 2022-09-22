<?php

namespace App\Models\Shared;

use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;



/**
 * Class Internship
 * @package App\Models\Shared
 * @version October 6, 2021, 12:43 pm UTC
 *
 * @property \App\Models\Shared\User $createdBy
 * @property \App\Models\Shared\Education $education
 * @property \App\Models\Shared\Experience $experience
 * @property \App\Models\Shared\Nationality $nationality
 * @property \App\Models\Shared\Proffession $proffession
 * @property \App\Models\Shared\Salary $salary
 * @property \Illuminate\Database\Eloquent\Collection $user1s
 * @property \Illuminate\Database\Eloquent\Collection $companies
 * @property \Illuminate\Database\Eloquent\Collection $languages
 * @property \Illuminate\Database\Eloquent\Collection $user2s
 * @property string $title
 * @property string $description
 * @property string $company_id
 * @property string $location
 * @property boolean $is_employed
 * @property boolean $is_active
 * @property integer $created_by
 * @property integer $nationality_id
 * @property integer $proffession_id
 * @property integer $experience_id
 * @property integer $education_id
 * @property integer $salary_id
 */
class Internship extends Model
{
    use SoftDeletes, CascadeSoftDeletes;


    public $table = 'internships';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = [];


    public $fillable = [
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
        'salary_id',
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
        'is_employed' => 'boolean',
        'is_active' => 'boolean',
        'created_by' => 'integer',
        'nationality_id' => 'integer',
        'proffession_id' => 'integer',
        'experience_id' => 'integer',
        'education_id' => 'integer',
        'salary_id' => 'integer',
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
        'is_employed' => 'bail|nullable|boolean',
        'is_active' => 'bail|nullable|boolean',
        'created_by' => 'bail|nullable',
        'nationality_id' => 'bail|nullable',
        'proffession_id' => 'bail|nullable',
        'experience_id' => 'bail|nullable',
        'education_id' => 'bail|nullable',
        'salary_id' => 'bail|nullable',
        'created_at' => 'bail|nullable',
        'deadline' => 'bail|required|date',
        'updated_at' => 'bail|nullable',
        'deleted_at' => 'bail|nullable'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'internship_user');
    }
    public function approvedUsers()
    {
        return $this->belongsToMany(User::class, "approved_internship_user");
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
