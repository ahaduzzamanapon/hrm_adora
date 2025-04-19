<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

/**
 * Class AttendanceSetting
 * @package App\Models
 * @version February 6, 2025, 4:14 am UTC
 *
 * @property string $in_time
 * @property string $out_time
 * @property string $start_date
 */
class AttendanceSetting extends Model
{

    public $table = 'attendance_settings';
    public $fillable = [
        'in_time',
        'out_time',
        'start_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'in_time' => 'string',
        'out_time' => 'string',
        'start_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'in_time' => 'required',
        'out_time' => 'required',
        'start_date' => 'required'
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
