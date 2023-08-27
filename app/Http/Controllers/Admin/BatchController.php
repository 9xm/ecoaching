<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\Course;
use App\Models\Batch;


use App\Models\Post;
use App\Models\Category;


class BatchController extends Controller{
    public function __construct(){
        //$categories=Category::orderBy("position", "asc")->get();
        //View::share('categories', $categories);
    }
    
    public function index(){
        $batches=Batch::orderBy("updated_at", "desc")->paginate(5);
        return view('admin.batch.index', ['batches'=>$batches]);
    }
    public function create(){
        $courses=Course::orderBy("title", "asc")->get();
        return view('admin.batch.create', ['courses'=> $courses]);
    }

    public function store(Request $request){


        $request->validate([
            'title' => 'required',
            'batch_start' => 'required',
            'batch_end' => 'required',
            'fee' => 'required',
            'course_id' => 'required',
        ]);


        $batch=new Batch;
        $batch->title=$request->title;
        $batch->description=$request->description;
        $batch->batch_start=$request->batch_start;
        $batch->batch_end=$request->batch_end;
        $batch->fee=$request->fee;
        $batch->course_id=$request->course_id;
        $batch->status=$request->status;

        
        $batch->save();

        return redirect()->route('admin.batches.edit', ['batch'=>$batch->id]);
    }
    public function show(string $id){
        return redirect()->route('admin.batches.index');
    }
    public function edit(string $id){
        $batch= Batch::where('id',$id)->first(); 
        $courses=Course::orderBy("title", "asc")->get();

        return view('admin.batch.edit', ['batch'=>$batch, 'courses'=> $courses]);
        
    }
    public function update(Request $request, string $id){

        $batch= Batch::find($id);
        
        $request->validate([
            'title' => 'required',
            'batch_start' => 'required',
            'batch_end' => 'required',
            'fee' => 'required',
            'course_id' => 'required',
        ]);
       
        $batch->title=$request->title;
        $batch->batch_start=$request->batch_start;
        $batch->batch_end=$request->batch_end;
        $batch->fee=$request->fee;
        $batch->description=$request->description;
        $batch->status=$request->status;


        $batch->save();

        return redirect()->route('admin.batches.edit', ['batch'=>$id]);
    }

   
    public function destroy(string $id){
        //@todo: delete here
    }

}