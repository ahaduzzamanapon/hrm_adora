<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PunchModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'punch_id',
        'time',
        'date',
    ];
}
