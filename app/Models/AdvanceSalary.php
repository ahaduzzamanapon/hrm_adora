<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AdvanceSalary
 * @package App\Models
 * @version April 27, 2025, 2:59 pm UTC
 *
 * @property string $date
 * @property integer $amount
 * @property string $reason
 */
class AdvanceSalary extends Model
{

    public $table = 'advancesalarys';
    



    public $fillable = [
        'date',
        'emp_id',
        'amount',
        'reason'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'amount' => 'integer',
        'reason' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'amount' => 'required',
        'reason' => 'required'
    ];

    
}
