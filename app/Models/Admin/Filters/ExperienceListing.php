<?php

namespace App\Models\Admin\Filters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceListing extends Model
{
    use HasFactory;

    protected $table = "experience_listing";

    protected $fillable = [
        "name",
        "min",
        "max"
    ];
    public static $rules = [
        'min' => 'required|numeric',
        'max' => 'nullable|numeric|different:min',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
}
