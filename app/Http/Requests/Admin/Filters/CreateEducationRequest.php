<?php

namespace App\Http\Requests\Admin\Filters;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Filters\Education;

class CreateEducationRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Education::$rules;
    }
}
