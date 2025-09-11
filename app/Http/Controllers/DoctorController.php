<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function doctorList(){
        $doctors = Doctor::where('user_id', Auth::user()->id)->get();
        $departments = Department::where('user_id', Auth::user()->id)->get();
        return view('doctorlist', compact('doctors', 'departments'));
    }

public function doctorProcess(Request $request){
    $data = $request->only('user_id', 'department_id', 'name', 'description');

    // image upload
    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('uploads/doctors/'), $filename);
        $data['image'] = url('/uploads/doctors/'.$filename);
    }

    // social media links -> name as key, link as value
    $sociallinks = [];
    if ($request->social_media_names && $request->social_media_links) {
        foreach ($request->social_media_names as $index => $name) {
            $link = $request->social_media_links[$index] ?? null;
            if (!empty($name) && !empty($link)) {
                $sociallinks[strtolower(trim($name))] = $link;
            }
        }
    }
    $data['social_media_links'] = json_encode($sociallinks);

    Doctor::insert($data);
    return back()->with('success', 'Doctor Added Successfully');
}


    public function doctorEdit($id){
       $finddoctor = Doctor::with('department')->find($id);
       $departments = Department::where('user_id', Auth::user()->id)->get();
       if($finddoctor){
            return response()->json(['status'=>'success', 'message'=>'Doctor Detail Show Successfully', 'data'=>$finddoctor, 'departments'=>$departments]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Doctor Id Not Matched']);
       }
       
    }

    public function doctorUpdate(Request $request){
       $updatedoctor = Doctor::where('id', $request->doctor_id)->first();
       if($updatedoctor){
        $data = $request->only(['user_id', 'department_id', 'name', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/doctors/'), $filename);
            $data['image'] = url('/').'/uploads/doctors/' . $filename; // relative path
        }else{
            $data['image'] = $updatedoctor->image;
        }
    $sociallinks = [];
    if ($request->social_media_names && $request->social_media_links) {
        foreach ($request->social_media_names as $index => $name) {
            $link = $request->social_media_links[$index] ?? null;
            if (!empty($name) && !empty($link)) {
                $sociallinks[strtolower(trim($name))] = $link;
            }
        }
    }
        $data['social_media_links'] = json_encode($sociallinks);
        Doctor::where('id', $updatedoctor->id)->update($data);
        // $updateblog->update($data);
        return back()->with('success', 'Doctor Updated Successfully');
       }else{
        return back()->with('error', 'Doctor Id Not Matched');
       }
    }
    public function doctorDelete(Request $request){
      $deletedoctor = Doctor::find($request->deleteid);
      if($deletedoctor){
        $deletedoctor->delete();
        return back()->with('success', 'Doctor Deleted Successfully');
      }else{
        return back()->with('error', 'Doctor Id Not Matched');
      }
    }
}
