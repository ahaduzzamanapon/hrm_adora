<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LeaveType
 * @package App\Models
 * @version April 19, 2025, 1:01 pm UTC
 *
 * @property string $leave_type
 * @property integer $day
 * @property string $effect_salary
 */
class LeaveType extends Model
{

    public $table = 'leave_types';
    



    public $fillable = [
        'leave_type',
        'day',
        'effect_salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'leave_type' => 'string',
        'day' => 'integer',
        'effect_salary' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'leave_type' => 'required',
        'day' => 'required',
        'effect_salary' => 'required'
    ];

    
}
