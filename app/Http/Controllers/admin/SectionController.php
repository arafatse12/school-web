<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Auth;
use App\Models\User;
use Str;
use Toastr;
class SectionController extends Controller
{
   public function view(){
        $data['alldata'] = Section::get();
    return view('admin.section.view-section',$data);
    }
    
   
    
     public function store(Request $request){
     
        $this->validate($request,[
            'section_name'=>'required|unique:sections,section_name'

        ]);
        $data = new Section();
        $data->section_name = $request->section_name;
        $data->save();

         Toastr::success('Section Added Successfully','success');
        return back();
    }
        
        public function update(Request $request,$id){
            $data = Section::find($id);
             $this->validate($request,[
            'section_name'=>'required'
        ]);

        $data->section_name = $request->section_name;
        $data->save();

        Toastr::success('Section Updated Successfully','success');
        return back();

    }


    public function delete(Request $request){
            $data = Section::find($request->id); 
             $data->delete();
           Toastr::success('Section Deleted Successfully','success');
        return back();


     }  
}
