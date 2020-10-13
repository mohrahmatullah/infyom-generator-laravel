<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class water
 * @package App\Models
 * @version April 2, 2019, 4:21 am UTC
 *
 * @property string quantity
 * @property string description
 */
class water extends Model
{
    use SoftDeletes;

    public $table = 'waters';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'quantity',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quantity' => 'required',
        'description' => 'required'
    ];

    
}
