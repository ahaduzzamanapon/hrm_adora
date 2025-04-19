<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

/**
 * Class Leave
 * @package App\Models
 * @version February 9, 2025, 5:00 am UTC
 *
 * @property string $member_id
 * @property string $date
 * @property string $is_half
 * @property string $status
 * @property string $Reason
 */
class Leave extends Model
{

    public $table = 'leaves';




    public $fillable = [
        'member_id',
        'leave_type',
        'date',
        'is_half',
        'status',
        'Reason'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_id' => 'string',
        'date' => 'string',
        'is_half' => 'string',
        'status' => 'string',
        'Reason' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'date' => 'required',
        'is_half' => 'required',
        'status' => 'required',
        'Reason' => 'required'
    ];



    protected $dates = [];
    public function setAttribute($key, $value)
    {
        if ($this->isDateColumn($key) && !empty($value)) {
            try {
                $value = Carbon::createFromFormat('d-m-Y', trim($value))->format('Y-m-d');
            } catch (\Exception $e) {
                \Log::error("Invalid date format for {$key}: {$value}");
            }
        }
        parent::setAttribute($key, $value);
    }

    private function isDateColumn($key)
    {
        static $dateColumns;
        if (!$dateColumns) {
            $dateColumns = array_filter(Schema::getColumnListing($this->getTable()), function ($column) {
                return in_array(Schema::getColumnType($this->getTable(), $column), ['date', 'datetime', 'timestamp']);
            });
        }
        return in_array($key, $dateColumns);
    }


}
