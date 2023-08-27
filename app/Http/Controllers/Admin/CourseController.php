<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\Course;
use App\Models\JoinCourse;


class CourseController extends Controller{
    public function __construct(){
        //$categories=Category::orderBy("position", "asc")->get();
        //View::share('categories', $categories);
    }
    
    public function index(){
        $courses=Course::orderBy("updated_at", "desc")->paginate(5);
        return view('admin.course.index', ['courses'=>$courses]);
    }
    public function create(){
        $data=[];
        return view('admin.course.create', $data);
    }

    public function store(Request $request){

        $request['slug']=Str::slug($request->title, "-");

        $request->validate([
            'title' => 'required',
            'slug'    =>  'unique:courses,slug',
            'content' => 'required',
            'status' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);


        $course=new Course;
        $course->title=$request->title;
        $course->slug=$request->slug;
        $course->content=$request->content;
        $course->status=$request->status;

        $hasImage=$this->imageUpload($request);
        if($hasImage){
            $course->image=$hasImage;
        }
        
        $course->save();

        return redirect()->route('admin.courses.edit', ['course'=>$course->id]);
    }
    public function show(string $id){
        return redirect()->route('admin.courses.index');
    }
    public function edit(string $id){
        $course= Course::where('id',$id)->first(); 
        return view('admin.course.edit', ['course'=>$course]);
        
    }
    public function update(Request $request, string $id){

        $course= Course::find($id);
        
        $request['slug']=Str::slug($request->title, "-");

        if($course->slug == $request['slug']){
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
        }else{
            $request->validate([
                'title' => 'required',
                'slug'    =>  'unique:courses,slug',
                'content' => 'required',
            ]);
            $course->slug=$request->slug;
        }
       
        $course->title=$request->title;
        $course->content=$request->content;
        $course->status=$request->status;

        $hasImage=$this->imageUpload($request);
        if($hasImage){
            $course->image=$hasImage;
        }

        $course->save();

        return redirect()->route('admin.courses.edit', ['course'=>$id]);
    }

    private function imageUpload($request){
        
        $file = $request->file('image');
        if($request->hasFile('image') && $file->getSize()>0){
            $fileName = $file->getClientOriginalName();
            $upload_path = public_path('course/'.date('Y/m'));
            File::isDirectory($upload_path) or File::makeDirectory($upload_path, 0777, true, true);
            
            $file->move($upload_path, $fileName);
            return 'course/'.date('Y/m/').$fileName;
        }else{
            if(!empty($request->image_trash)){
                return '';
            }
        }

        return false;
 
    }
    public function destroy(string $id){
        //@todo: delete here
    }

    public function joinCourses(Request $request){

        if(Auth::user()->role == 'admin'):
            $join_courses=JoinCourse::orderBy("updated_at", "desc")->paginate(5);
            return view('admin.course.join', ['join_courses'=>$join_courses]);
        endif;


        if(Auth::user()->role == 'subscriber'):
            $join_courses=JoinCourse::where('user_id', Auth::user()->id)->orderBy("updated_at", "desc")->paginate(5);
            return view('subscriber.join-course', ['join_courses'=>$join_courses]);
        endif;
        
    }

    public function joinCourseEdit(Request $request, $id){
        $join_course=JoinCourse::find($id);
        return view('admin.course.join-edit', ['join_course'=>$join_course]);
    }
    public function joinCourseUpdate(Request $request, $id){
        $join_course=JoinCourse::find($id);
        $join_course->status=$request->status;
        $join_course->save();
        return redirect()->route('admin.join.course.edit', ['id'=>$id]);

    }
}