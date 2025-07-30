<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function departmentList(){
        $departments = Department::where('user_id', Auth::user()->id)->latest()->get();
        return view('departmentlist', compact('departments'));
    }

    public function departmentProcess(Request $request){
        $data = $request->only(['user_id', 'name', 'description']);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/department/'), $filename);
            $data['image'] = url('/').'/uploads/department/' . $filename; // relative path
        }

        Department::insert($data);

        return redirect()->route('department.list')->with('success', 'Department Added Successfully');
    }

    public function departmentEdit($id){
       $finddepartment = Department::find($id);
       if($finddepartment){
            return response()->json(['status'=>'success', 'message'=>'Department Detail Show Successfully', 'data'=>$finddepartment]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Department Id Not Matched']);
       }
       
    }

    public function departmentUpdate(Request $request){
       $updatedepartment = Department::where('id', $request->department_id)->first();
       if($updatedepartment){
        $data = $request->only(['name', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/department/'), $filename);
            $data['image'] = url('/').'/uploads/department/' . $filename; // relative path
        }else{
            $data['image'] = $updatedepartment->image;
        }
        Department::where('id', $updatedepartment->id)->update($data);
        return back()->with('success', 'Department Updated Successfully');
       }else{
        return back()->with('error', 'Department Id Not Matched');
       }
    }

    public function departmentDelete(Request $request){
      $deleteDepartment = Department::find($request->deleteid);
      if($deleteDepartment){
        $deleteDepartment->delete();
        return back()->with('success', 'Department Deleted Successfully');
      }else{
        return back()->with('error', 'Department Id Not Matched');
      }
    }
}
