<?php

namespace App\Repositories;

use App\Models\water;
use App\Repositories\BaseRepository;

/**
 * Class waterRepository
 * @package App\Repositories
 * @version April 2, 2019, 4:21 am UTC
*/

class waterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quantity',
        'description'
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
        return water::class;
    }
}
