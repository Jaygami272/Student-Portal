<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachs extends Model
{
    use HasFactory;
    public $table = 'teachs';
    
    public $fillable = [
        'sub_id',
        'faculty_id',
        
    ];

    public function getsubject()
    {
        return $this->hasOne(Subject::class, 'id', 'sub_id');
    }

    function getfaculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
}
