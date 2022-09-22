<?php

namespace App\Models;

use App\Models\Admin\Job;
use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Salary;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\Experience;
use Illuminate\Notifications\Notifiable;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CascadeSoftDeletes, CanResetPassword;

    protected $cascadeDeletes = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names',
        'phone_number',
        'email',
        'dob',
        'skills',
        'is_employed',
        'language_id',
        'gender_id',
        'nationality_id',
        'proffession_id',
        'experience_id',
        'salary_id',
        'education_id',
        'user_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
    public function educations()
    {
        return $this->belongsToMany(Education::class)->withPivot('school_name', "start_date", "end_date");
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class, "id", "experience_id");
    }
    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', "gender_id");
    }
    public function nationality()
    {
        return $this->hasOne(Nationality::class, "id", "nationality_id");
    }
    public function salary()
    {
        return $this->hasOne(Salary::class, 'id', "salary_id");
    }
    public function proffession()
    {
        return $this->hasOne(Proffession::class, 'id', 'proffession_id');
    }
    public function approvedJobs()
    {
        return $this->hasMany(Job::class, "approved_job_user");
    }
    public function jobs()
    {
        return $this->hasMany(Job::class, "approved_job_user");
    }
}
