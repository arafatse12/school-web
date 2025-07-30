<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use Hash;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Group;
use App\Models\Section;
use App\Models\Session;
use App\Models\Category;
use App\Models\ClassName;
use App\Models\IssueBook;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{ 
    public function view(){
    $data['alldata'] = User::where('role_id','3')->get();
    $data['roles'] = Role::get();
    $data['classes'] = StudentClass::get();
    return view('admin.student.view-student',$data);
    }

    // public function userview(){
    // $data['alldata'] = User::where('role_id',3)->get();
    //  $data['roles'] = Role::get();
    // return view('admin.user.view-user',$data);
    // }

    public function add(){
     $roles = Role::get();
    	return view('admin.student.add-student',compact('roles'));
    }
    
     public function store(Request $request){

            $this->validate($request,[
            'name'=>'required',
            'mobile'=>'required',
            'roll'=>'required',
            'class'=>'required',
            'address'=>'nullable',
        ]);

      $code = rand(000000,999999);
        
    	$data = new User();

      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $filename = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('upload/studentimage'), $filename);
          $data->image = $filename; // ✅ only filename saved
      }
    	$data->role_id = 3;
      $data->name = $request->name;
    	$data->email = 'student' . rand(1, 9999) . '@gmail.com';
    	$data->mobile = $request->mobile;
    	$data->roll = $request->roll;
    	$data->class = $request->class;
    	$data->address = $request->address;
      $data->password = Hash::make($code);
    	$data->code = $code;
    	$data->save();

    	return redirect()->route('admin.student.view')->with('success','Student Created Successfully');
    }
        
        public function edit($id){
            $editdata = User::find($id);
            $roles = Role::get();
            return view('admin.student.edit-student',compact('editdata','roles'));

        }
        public function update(Request $request,$id){


            $this->validate($request,[
            'name'=>'required',
            'mobile'=>'required',
            'roll'=>'required',
            'class'=>'required',
            'address'=>'nullable',
        ]);
             $this->validate($request,[
            'name'=>'required',
            'mobile'=>'required',
            'roll'=>'required',
            'class'=>'required',
            'address'=>'nullable',
        ]);
            $data = User::find($id);

          if ($request->hasFile('image')) {
            // Delete old image if it exists
            $oldPath = public_path('upload/studentimage/' . $data->image);
            if ($data->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/studentimage'), $filename);
            $data->image = $filename; // ✅ only filename saved
        }
        $data->name = $request->name;
         $data->mobile = $request->mobile;
         $data->roll = $request->roll;
         $data->class = $request->class;
         $data->address = $request->address;
        $data->save();

        return redirect()->route('admin.student.view')->with('success','Student Updated Successfully');

        }

          public function inactive($id){
            $user = User::find($id);
            $user->status = 0;
            $user->save();
           return redirect()->route('admin.student.view')->with('success','Student Inactive Successfully');
        }

        public function active($id){
            $user = User::find($id);
            $user->status = 1;
            $user->save();
          return redirect()->route('admin.student.view')->with('success','Librarian Active Successfully');
        } 

          public function delete($id){
            $student = User::find($id);

          if (file_exists('public/upload/studentimage/' . $student->image) AND !
            empty($student->image)){
               unlink('public/upload/studentimage/' . $student->image);
       }
            $student->delete();
            return redirect()->route('admin.student.view')->with('success','Librarian Deleted Successfully');
          }  


        public function userwisebook(Request $request){
      $data['allbooks'] = IssueBook::where('created_by',$request->user_id)->get();
      return view('admin.user.user-allbook',$data);
      
    }

         
}


