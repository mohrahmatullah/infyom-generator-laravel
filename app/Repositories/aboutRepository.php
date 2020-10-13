<?php

namespace App\Repositories;

use App\Models\about;
use App\Repositories\BaseRepository;

/**
 * Class aboutRepository
 * @package App\Repositories
 * @version April 2, 2019, 5:10 am UTC
*/

class aboutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'body',
        'image'
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
        return about::class;
    }
}
