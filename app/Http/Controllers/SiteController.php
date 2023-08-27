<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\JoinCourse;
use Barryvdh\DomPDF\Facade\Pdf;

class SiteController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function courses(Request $request){
        $courses=Course::orderBy("updated_at", "desc")->paginate(5);

        return view('site.courses', ['courses'=> $courses]);
    }
    public function course(Request $request, $id){
        $course=Course::find($id);
        //dd($course->batches);
        return view('site.course', ['course'=> $course]);
    }
    public function join(Request $request){

        $request->validate([
            'batch_id' => 'required',
            'transaction_number' => 'required',
            'transaction_date'    =>  'required'
        ]);

        $join_course=new JoinCourse;
        $join_course->course_id=$request->course_id;
        $join_course->batch_id=$request->batch_id;
        $join_course->user_id=Auth::id();
        $join_course->transaction_number=$request->transaction_number;
        $join_course->transaction_date=$request->transaction_date;
        $join_course->status='processed';

        
        $join_course->save();

        return redirect()->route('course', ['id'=>$request->course_id])->with('success', 'Successfully submitted.');;

    }

   

}