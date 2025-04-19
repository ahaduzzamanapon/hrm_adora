<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    use HasFactory;


    protected $fillable = [
        'member_id',
        'date',
        'in_time',
        'out_time',
        'late_status',
        'early_out_status',
        'status',
    ];
}
