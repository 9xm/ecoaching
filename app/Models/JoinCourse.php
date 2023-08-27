<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Course;
use  App\Models\Batch;
use  App\Models\User;

class JoinCourse extends Model
{
    use HasFactory;
    protected $fillable=['course_id', 'batch_id','user_id', 'transaction_number', 'status'];
    //status: processed, join, complete, incomplete 

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
