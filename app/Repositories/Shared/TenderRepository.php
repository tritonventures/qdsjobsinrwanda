<?php

namespace App\Repositories\Shared;

use App\Models\Shared\Tender;
use App\Repositories\BaseRepository;

/**
 * Class TenderRepository
 * @package App\Repositories\Shared
 * @version August 12, 2021, 9:55 am UTC
*/

class TenderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'title_slug',
        'company_id',
        'description',
        'location',
        'no_of_positions',
        'website_link',
        'categories',
        'experience',
        'education',
        'attachments',
        'deadline'
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
        return Tender::class;
    }
}
