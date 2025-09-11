<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function aboutList(Request $request){
        $abouts = About::where('user_id', Auth::user()->id)->get();
        return view('aboutlist', compact('abouts'));
    }
    // public function editAbout($id){
    //    $findabout = About::find($id);
    //    if($findabout){
    //         return response()->json(['status'=>'success', 'message'=>'About Detail Show Successfully', 'data'=>$findabout]);
    //    }else{
    //         return response()->json(['status'=>'error', 'message'=>'About Id Not Matched']);
    //    }
       
    // }

    // public function aboutProcess(Request $request) {
    //     $data = $request->only(['title', 'subtitle', 'link', 'description']);

    //     if($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $filename = time().'_'.$image->getClientOriginalName(); // unique filename
    //         $image->move(public_path('uploads/'), $filename);
    //         $data['image'] = url('/').'/uploads/' . $filename; // relative path
    //     }

    //     About::insert($data);

    //     return redirect()->route('about.list')->with('success', 'About Added Successfully');
    // }

    public function createAbout(){
      $findabout = About::where('user_id', Auth::user()->id)->first();
      return view('createabout', compact('findabout'));
    }

    public function updateAbout(Request $request){
       $updateabout = About::where('id', $request->about_id)->first();
       if($updateabout){
        $data = $request->only(['title', 'subtitle', 'link', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/'), $filename);
            $data['image'] = url('/').'/uploads/' . $filename; // relative path
        }else{
            $data['image'] = $updateabout->image;
        }
        $updateabout->update($data);
        return back()->with('success', 'About Updated Successfully');
       }else{
        $data = $request->only(['user_id', 'title', 'subtitle', 'link', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/'), $filename);
            $data['image'] = url('/').'/uploads/' . $filename; // relative path
        }
        About::insert($data);
        return back()->with('success', 'About Added Successfully');
       }
    }

    // public function deleteAbout(Request $request){
    //   $deleteabout = About::find($request->deleteid);
    //   if($deleteabout){
    //     $deleteabout->delete();
    //     return back()->with('success', 'About Deleted Successfully');
    //   }else{
    //     return back()->with('error', 'About Id Not Matched');
    //   }
    // }

}
