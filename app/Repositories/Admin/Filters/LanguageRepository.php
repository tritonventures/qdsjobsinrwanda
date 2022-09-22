<?php

namespace App\Repositories\Admin\Filters;

use App\Models\Admin\Filters\Language;
use App\Repositories\BaseRepository;

/**
 * Class LanguageRepository
 * @package App\Repositories\Admin\Filters
 * @version July 24, 2021, 12:45 pm UTC
*/

class LanguageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Language::class;
    }
}
