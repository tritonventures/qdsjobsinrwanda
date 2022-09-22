<?php

namespace App\Models\Admin\Filters;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nationality
 * @package App\Models\Admin\Filters
 * @version July 24, 2021, 12:43 pm UTC
 *
 * @property string $name
 */
class Nationality extends Model
{
    use HasFactory;


    public $table = 'nationalities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function users()
    {
        $this->hasMany(User::class, 'nationality_id');
    }
}
