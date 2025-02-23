<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $table = 'subjects';
    
    public $fillable = [
        'sub_name',
        'sub_code',
        'sub_credit',
        'sem'
    ];
}
