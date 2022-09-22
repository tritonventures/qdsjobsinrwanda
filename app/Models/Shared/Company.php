<?php

namespace App\Models\Shared;

use App\Models\Candidate\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Company
 * @package App\Models\Shared
 * @version September 9, 2021, 12:14 pm UTC
 *
 * @property string $name
 * @property string $logo
 * @property string $description
 * @property string $website
 */
class Company extends Model
{
    use SoftDeletes, HasFactory;


    public $table = 'companies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];




    public $fillable = [
        'name',
        'logo',
        'description',
        'website'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'logo' => 'string',
        'description' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'bail|required|string|max:255',
        'logo' => 'bail|nullable|string',
        'description' => 'bail|nullable|string',
        'website' => 'bail|nullable|string|max:255',
        'created_at' => 'bail|nullable',
        'updated_at' => 'bail|nullable',
        'deleted_at' => 'bail|nullable'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }
    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}
