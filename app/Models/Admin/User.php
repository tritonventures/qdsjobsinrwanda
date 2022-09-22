<?php

namespace App\Models\Admin;

use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Salary;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Education;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models\Admin
 * @version July 29, 2021, 5:49 pm UTC
 *
 * @property string $names
 * @property string $email
 * @property string $phone_number
 * @property string $age
 * @property string $dob
 * @property string $user_type
 * @property string $skills
 * @property boolean $is_employed
 * @property boolean $is_active
 * @property integer $language_id
 * @property integer $gender_id
 * @property integer $nationality_id
 * @property integer $proffession_id
 * @property integer $experience_id
 * @property integer $education_id
 * @property integer $salary_id
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class User extends Model
{
    use SoftDeletes, Notifiable, CascadeSoftDeletes, CanResetPassword;
    use HasFactory;


    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = [];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'names' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'age' => 'string',
        'dob' => 'date',
        'user_type' => 'string',
        'skills' => 'string',
        'is_employed' => 'boolean',
        'is_active' => 'boolean',
        'language_id' => 'integer',
        'gender_id' => 'integer',
        'nationality_id' => 'integer',
        'proffession_id' => 'integer',
        'experience_id' => 'integer',
        'education_id' => 'integer',
        'salary_id' => 'integer',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'names' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone_number' => 'nullable|string|max:255',
        'age' => 'nullable|string|max:255',
        'dob' => 'nullable',
        'user_type' => 'required|string|max:255',
        'skills' => 'nullable|string|max:255',
        'is_employed' => 'nullable|boolean',
        'is_active' => 'nullable|boolean',
        'language_id' => 'nullable',
        'gender_id' => 'nullable',
        'nationality_id' => 'nullable',
        'proffession_id' => 'nullable',
        'experience_id' => 'nullable',
        'education_id' => 'nullable',
        'salary_id' => 'nullable',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function education()
    {
        return $this->belongsToMany(Education::class, "education_user", 'education_id')->withPivot('school_name', "start_date", "end_date");
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_id', 'id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }
    public function proffession()
    {
        return $this->hasOne(Proffession::class, 'id', "proffession_id");
    }
    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id', 'id');
    }
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_user');
    }
    public function approvedJobs()
    {
        return $this->hasMany(Job::class, "approved_job_user");
    }
}
