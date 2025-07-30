<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blogList(){
        $blogs = Blog::with('user')->where('userid', Auth::user()->id)->get();
        return view('bloglist', compact('blogs'));
    }

    public function blogProcess(Request $request){
        $data = $request->only('userid', 'title', 'description');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs/'), $filename);
            $data['image'] = url('/uploads/blogs/'.$filename);
        }
        Blog::insert($data);
        return back()->with('success', 'Blog Added Successfully');
    }

    public function blogEdit($id){
       $findblog = Blog::find($id);
       if($findblog){
            return response()->json(['status'=>'success', 'message'=>'Blog Detail Show Successfully', 'data'=>$findblog]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Blog Id Not Matched']);
       }
    }

    public function blogUpdate(Request $request){
       $updateblog = Blog::where('id', $request->blog_id)->first();
       if($updateblog){
        $data = $request->only(['title', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/blogs/'), $filename);
            $data['image'] = url('/').'/uploads/blogs/' . $filename; // relative path
        }else{
            $data['image'] = $updateblog->image;
        }
        Blog::where('id', $updateblog->id)->update($data);
        // $updateblog->update($data);
        return back()->with('success', 'Blog Updated Successfully');
       }else{
        return back()->with('error', 'Blog Id Not Matched');
       }
    }

    public function blogDelete(Request $request){
      $deleteblog = Blog::find($request->deleteid);
      if($deleteblog){
        $deleteblog->delete();
        return back()->with('success', 'Blog Deleted Successfully');
      }else{
        return back()->with('error', 'Blog Id Not Matched');
      }
    }
}
