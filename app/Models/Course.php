<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\JoinCourse;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['title', 'slug', 'image', 'content', 'status'];
    
    public function batches(){
        return $this->hasMany(Batch::class, 'course_id', 'id');
    }
    public function joinCourse(){
        return $this->hasOne(JoinCourse::class, 'course_id', 'id');
    }
}
