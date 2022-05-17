<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = "schedule";
    protected $primaryKey = "id_schedule";
    protected $fillable = [
        'time_start',
        'time_end',
        'day',
    ];
}
