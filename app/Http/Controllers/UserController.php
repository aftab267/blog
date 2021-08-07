<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    
    public function form()
    {
        return view('form');
        //echo "aftab";
    }
      function insert(Request $request){
        if($request->file('image')){
          $image=$request->file('image')->store('uploaded_image');
        }else{
          $image=null;
        }
        
        $emp_name=$request->emp_name;
        $fathers_name=$request->fathers_name;
        $mothers_name=$request->mothers_name;

        DB::table('employee_info')->insert(array('emp_name'=>$emp_name,'father_name'=>$fathers_name,'mother_name'=>$mothers_name,'emp_image'=>$image));
        return redirect('user-form')->with('message','Data Inserted Successfully.');
      }
      function showdata(){
        $data=DB::table('employee_info')->get();
        return view('showdata',array('query'=>$data));
      }
      function edit($emp_id){
         $data=DB::table('employee_info')->where('emp_id',$emp_id)->first();
         return view('edit',['data'=>$data]);
      }
      function update(Request $req){
        if($req->file('image')){
         $data=DB::table('employee_info')->where('emp_id',$req->emp_id)->first();
           if(file_exists('storage/'.$data->emp_image)){
            unlink('storage/'.$data->emp_image);
           }       
          $image=$req->file('image')->store('uploaded_image');
        }else{
          $image=null;
        }

         $emp_id=$req->emp_id;
         $emp_name=$req->emp_name;
        $fathers_name=$req->fathers_name;
        $mothers_name=$req->mothers_name;
        if(empty($image)){
        DB::table('employee_info')->where('emp_id',$emp_id)->update(['emp_name'=>$emp_name,'father_name'=>$fathers_name,'mother_name'=>$mothers_name]);

        }else{DB::table('employee_info')->where('emp_id',$emp_id)->update(['emp_name'=>$emp_name,'father_name'=>$fathers_name,'mother_name'=>$mothers_name,'emp_image'=>$image]);

        }
        
         return redirect('show-data')->with('message','Data Updated Successfully.');
      }
      function deleteData($emp_id){
        $data=DB::table('employee_info')->where('emp_id',$emp_id)->first();
           if(file_exists('storage/'.$data->emp_image)){
            unlink('storage/'.$data->emp_image);
           }     
        DB::table('employee_info')->where('emp_id',$emp_id)->delete();
        return redirect('show-data')->with('message','Data deleted Successfully.');

      }
      


}