<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class StudentDashboardController extends Controller
{
    public function dashboard(){
        $data=[];
        return view('student.dashboard', $data);
    }

    

}