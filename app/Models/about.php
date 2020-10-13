<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class about
 * @package App\Models
 * @version April 2, 2019, 5:10 am UTC
 *
 * @property string body
 * @property string image
 */
class about extends Model
{
    use SoftDeletes;

    public $table = 'abouts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'body',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'body' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'body' => 'required',
        'image' => 'required'
    ];

    
}
