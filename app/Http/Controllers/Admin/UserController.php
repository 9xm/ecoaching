<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


use App\Models\User;



class UserController extends Controller
{
    public function index(){
        $users=User::orderBy("updated_at", "desc")->paginate(5);
        return view('admin.user.index', ['users'=>$users]);

    }
    public function create(){
        return redirect()->route('admin.users.index');
    }
    public function store(Request $request){
        return redirect()->route('admin.users.index');
    }

    public function show(string $id){
        return redirect()->route('admin.categories.index');
    }

    public function edit(string $id){
        $user= User::where('id',$id)->first(); ;
        if($user){
            return view('admin.user.edit', ['user'=>$user]);
        }
        return redirect()->route('admin.users.index');

    }
    public function update(Request $request, string $id){
        $user= User::find($id);
        

        $request->validate([
            'name' => 'required',
            //'summary' => 'required',
        ]);

        $user->name=$request->name;
        $user->summary=$request->summary;
        if($request->role){
            $user->role=$request->role;
        }

        $hasImage=$this->imageUpload($request);
        if($hasImage){
            $user->image=$hasImage;
        }

        $user->save();

        return redirect()->route('admin.users.edit', ['user'=>$id]);
    }
    private function imageUpload($request){
        
        $file = $request->file('image');
        if($request->hasFile('image') && $file->getSize()>0){
            $fileName = $file->getClientOriginalName();
            $upload_path = public_path('user/'.date('Y/m'));
            File::isDirectory($upload_path) or File::makeDirectory($upload_path, 0777, true, true);
            
            $file->move($upload_path, $fileName);
            return 'user/'.date('Y/m/').$fileName;
        }else{
            if(!empty($request->image_trash)){
                return '';
            }
        }

        return false;
 
    }

    public function destroy(string $id){
        //
    }
}
