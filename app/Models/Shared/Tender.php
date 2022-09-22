<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Filters\Proffession;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


/**
 * Class Tender
 * @package App\Models\Shared
 * @version August 12, 2021, 9:55 am UTC
 *
 * @property string $title
 * @property string $title_slug
 * @property string $company_id
 * @property string $company_slug
 * @property string $image
 * @property string $description
 * @property string $location
 * @property string $no_of_positions
 * @property string $website_link
 * @property string $categories
 * @property string $experience
 * @property string $education
 * @property string $attachments
 * @property string $deadline
 */
class Tender extends Model
{
    use SoftDeletes, CascadeSoftDeletes;


    public $table = 'tenders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = [];


    public $fillable = [
        'title',
        'title_slug',
        'company_id',
        'description',
        'location',
        'website_link',
        'attachments',
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
        'title_slug' => 'string',
        'company_id' => 'string',
        'description' => 'string',
        'location' => 'string',
        'website_link' => 'string',
        'deadline' => 'date:d-m-Y'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'bail|required|string|max:255',
        'company_id' => 'bail|required|string|max:255',
        'description' => 'bail|required|string',
        'location' => 'bail|nullable|string|max:255',
        'website_link' => 'bail|required|string|max:255',
        'deadline' => 'bail|required|date',
        'created_at' => 'bail|nullable',
        'updated_at' => 'bail|nullable'
    ];

    public function proffessions()
    {
        return $this->belongsToMany(Proffession::class);
    }


    public function proffessionsForOne()
    {
        return $this->hasMany(Proffession::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
