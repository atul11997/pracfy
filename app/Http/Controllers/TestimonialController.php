<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function testimonialList(){
        $testimonials = Testimonial::where('user_id', Auth::user()->id)->get();
        return view('testimoniallist', compact('testimonials'));
    }

    public function testimonialProcess(Request $request){
        $data = $request->only('user_id', 'company_name', 'author_name', 'rating', 'designation', 'message');
        if($request->hasFile('author_image')){
            $image = $request->file('author_image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/testimonials/'), $filename);
            $data['author_image'] = url('/uploads/testimonials/'.$filename);
        }
        Testimonial::insert($data);
        return back()->with('success', 'Testimonial Added Successfully');
    }

    public function testimonialEdit($id){
       $findtestimonial = Testimonial::find($id);
       if($findtestimonial){
            return response()->json(['status'=>'success', 'message'=>'Testimonial Detail Show Successfully', 'data'=>$findtestimonial]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Testimonial Id Not Matched']);
       }
       
    }

    public function testimonialUpdate(Request $request){
       $updatetestimonial = Testimonial::where('id', $request->testimonial_id)->first();
       if($updatetestimonial){
        $data = $request->only(['author_name', 'rating', 'designation', 'company_name', 'message']);
        if($request->hasFile('author_image')) {
            $image = $request->file('author_image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/testimonials/'), $filename);
            $data['author_image'] = url('/').'/uploads/testimonials/' . $filename; // relative path
        }else{
            $data['author_image'] = $updatetestimonial->author_image;
        }
         
        Testimonial::where('id', $updatetestimonial->id)->update($data);
        return back()->with('success', 'Testimonial Updated Successfully');
       }else{
        return back()->with('error', 'Testimonial Id Not Matched');
       }
    }

    public function testimonialDelete(Request $request){
      $deletetestimonials = Testimonial::find($request->deleteid);
      if($deletetestimonials){
        $deletetestimonials->delete();
        return back()->with('success', 'Testimonial Deleted Successfully');
      }else{
        return back()->with('error', 'Testimonial Id Not Matched');
      }
    }
}
