<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function bannerList(Request $request){
        $banners = Banner::where('user_id', Auth::user()->id)->get();
        return view('bannerlist', compact('banners'));
    }
    public function editBanner($id){
       $findbanner = Banner::find($id);
       if($findbanner){
            return response()->json(['status'=>'success', 'message'=>'Banner Detail Show Successfully', 'data'=>$findbanner]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Banner Id Not Matched']);
       }
       
    }

    public function bannerProcess(Request $request) {
        $request->validate([
            'image'=>'required|image|max:2048'
        ]);
        $bannerCount = Banner::where('user_id', Auth::user()->id)->count();
        if($bannerCount > 2){
            return back()->with('error', 'Only 3 Banner Added');
        }
        $data = $request->only(['user_id', 'title', 'subtitle', 'link', 'description']);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/banner/'), $filename);
            $data['image'] = url('/').'/uploads/banner/' . $filename; // relative path
        }

        Banner::insert($data);

        return redirect()->route('banner.list')->with('success', 'Banner Added Successfully');
    }

    public function updateBanner(Request $request){
       $updatebanner = Banner::where('id', $request->banner_id)->first();
       if($updatebanner){
        $data = $request->only(['title', 'subtitle', 'link', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/banner/'), $filename);
            $data['image'] = url('/').'/uploads/banner/' . $filename; // relative path
        }else{
            $data['image'] = $updatebanner->image;
        }
        Banner::where('id', $updatebanner->id)->update($data);
        // $updatebanner->update($data);
        return back()->with('success', 'Banner Updated Successfully');
       }else{
          return back()->with('error', 'Banner Id Not Matched');
       }
    }

    public function deleteBanner(Request $request){
      $deletebanner = Banner::find($request->deleteid);
      if($deletebanner){
        $deletebanner->delete();
        return back()->with('success', 'Banner Deleted Successfully');
      }else{
        return back()->with('error', 'Banner Id Not Matched');
      }
    }
}
