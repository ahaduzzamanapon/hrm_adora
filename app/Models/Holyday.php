<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

/**
 * Class Holyday
 * @package App\Models
 * @version February 9, 2025, 3:45 am UTC
 *
 * @property string $title
 * @property string $date
 * @property string $description
 */
class Holyday extends Model
{

    public $table = 'holydays';




    public $fillable = [
        'title',
        'date',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'date' => 'date',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'date' => 'required'
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
