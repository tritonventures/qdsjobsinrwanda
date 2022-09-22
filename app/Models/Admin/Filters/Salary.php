<?php

namespace App\Models\Admin\Filters;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Salary
 * @package App\Models\Admin\Filters
 * @version July 24, 2021, 12:45 pm UTC
 *
 * @property string $name
 * @property string $min
 * @property string $max
 */
class Salary extends Model
{
    use HasFactory;


    public $table = 'salaries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'min',
        'max'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'min' => 'string',
        'max' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'min' => 'nullable|string|max:255',
        'max' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    public function users()
    {
        $this->hasMany(User::class, 'salary_id');
    }
}
