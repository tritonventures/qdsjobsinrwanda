<?php

namespace App\Models\Admin\Filters;

use App\Models\User as AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Language
 * @package App\Models\Admin\Filters
 * @version July 24, 2021, 12:45 pm UTC
 *
 * @property string $name
 */
class Language extends Model
{
    use HasFactory;


    public $table = 'languages';

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
        return $this->belongsToMany(AdminUser::class, 'language_id');
    }
    public function jobs()
    {
        return $this->hasMany(Language::class);
    }
}
