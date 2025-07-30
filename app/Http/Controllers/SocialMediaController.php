<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    public function socialMediaList(){
        $socialmedias = SocialMedia::where('user_id', Auth::user()->id)->get();
        return view('sociallist', compact('socialmedias'));
    }

    public function socialProcess(Request $request){
        $data = $request->only(['user_id', 'name', 'link']);
        SocialMedia::insert($data);
        return back()->with('success', 'Social Media Added Successfully');
    }

    public function socialUpdate(Request $request){
        $updatesocial = SocialMedia::find($request->social_id);
        if($updatesocial){
            $data = $request->only(['name', 'link']);
            SocialMedia::where('id', $updatesocial->id)->update($data);
            // $updatesocial->update($data);
            return back()->with('success', 'Social Media Updated Successfully');
        }else{
          return back()->with('error', 'Social Media Id Not Matched');
      }

  }

  public function socialDelete(Request $request){
      $deletesocial = SocialMedia::find($request->deleteid);
      if($deletesocial){
        $deletesocial->delete();
        return back()->with('success', 'Social Media Deleted Successfully');
      }else{
        return back()->with('error', 'Social Media Id Not Matched');
      }
    }
}
