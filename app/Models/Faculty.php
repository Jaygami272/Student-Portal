<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    public $table = 'faculties';
    
    public $fillable = [
        'user_id'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function dep() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function teaches()
{
    return $this->belongsToMany(Teachs::class, 'faculty_id');
}
}
