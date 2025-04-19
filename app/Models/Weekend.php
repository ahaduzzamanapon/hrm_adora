<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Weekend
 * @package App\Models
 * @version February 6, 2025, 4:02 pm UTC
 *
 * @property string $day
 */
class Weekend extends Model
{

    public $table = 'weekends';




    public $fillable = [
        'day'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'day' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'day' => 'required'
    ];

}
