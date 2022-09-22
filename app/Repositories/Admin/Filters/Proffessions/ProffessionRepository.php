<?php

namespace App\Repositories\Admin\Filters\Proffessions;

use App\Models\Admin\Filters\Proffessions\Proffession;
use App\Repositories\BaseRepository;

/**
 * Class ProffessionRepository
 * @package App\Repositories\Admin\Filters\Proffessions
 * @version July 24, 2021, 12:41 pm UTC
*/

class ProffessionRepository extends BaseRepository
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
        return Proffession::class;
    }
}
