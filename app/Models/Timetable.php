<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    public $table = 'timetables';
    
    public $fillable = [
        'dept_id',
        'sem',
        'file_name',
        'file_type'
    ];
}
