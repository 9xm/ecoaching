<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Course;
use  App\Models\JoinCourse;

class Batch extends Model
{
    use HasFactory;
    protected $fillable=['title', 'description', 'batch_start', 'batch_end', 'fee', 'course_id', 'status'];
    protected $dates = ['batch_start', 'batch_end'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function joinCourse(){
        return $this->hasOne(JoinCourse::class, 'batch_id', 'id');
    }
}
