<?php

namespace App\Repositories;

use App\Models\Glass;
use App\Repositories\BaseRepository;

/**
 * Class GlassRepository
 * @package App\Repositories
 * @version April 2, 2019, 4:50 am UTC
*/

class GlassRepository extends BaseRepository
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
        return Glass::class;
    }
}
