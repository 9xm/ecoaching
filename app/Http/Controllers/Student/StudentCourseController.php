<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinCourse;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentCourseController extends Controller{
   

    public function joinCourses(Request $request){      
        $join_courses=JoinCourse::where('user_id', Auth::user()->id)->orderBy("updated_at", "desc")->paginate(5);
        return view('student.join-course', ['join_courses'=>$join_courses]);
    
    }
    public function certificate(Request $request, $id){
        //return view('site.certificate');
        $course=JoinCourse::where(['user_id'=> Auth::user()->id, 'id'=>$id])->first();
      
        $data=[
            'key'=>'CF'.$course->id.'-CR'.$course->course_id.'-BT'.$course->batch_id,
            'user_name'=> Auth::user()->name,
            'course_name'=> $course->course->title,
            'date'=> $course->updated_at->format('d M, Y'),
            'signature'=> 'Mr. Jhone Dove'
        ];
      
        //dd($course);
     $pdf = Pdf::loadView('student.certificate', $data);
     $pdf->set_paper('letter', 'landscape');
     $pdf->set_option('isHtml5ParserEnabled', true);
     return $pdf->download('certificate-'.time().'.pdf');
     //return $pdf->stream();
    }

}