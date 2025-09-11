<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function videoList(){
        $videos = Video::where('user_id', Auth::user()->id)->get();
        return view('videolist', compact('videos'));
    }

    public function videoProcess(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255'
        ]);
        Video::insert([
            'title' => $request->title,
            'videos' => url('/').'/uploads/videos/' . $request->video,
            'user_id' => $request->userid
        ]);

        return redirect()->back()->with('success', 'Video created successfully!');
    }


  public function uploadTemp(Request $request)
{
    if($request->videoid){
        $videodetail = Video::where('id', $request->videoid)->first();
        $filename = basename($videodetail->videos);
        $filepath = public_path('uploads/videos/'.$filename);
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/videos'), $filename); // Public folder me store

            return response()->json([
                'status' => 'success',
                'filename' => $filename
            ]);
        }
    }else{
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/videos'), $filename); // Public folder me store

            return response()->json([
                'status' => 'success',
                'filename' => $filename
            ]);
        }
    }

    return response()->json(['status' => 'error'], 400);
}   

    public function videoUpdate(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        ]);
        $videoupdate = Video::find($request->video_id);
        if($videoupdate){
            $data = [
                'title' => $request->title,
                'videos' => url('/').'/uploads/videos/'.$request->uploaded_video
            ];
                Video::where('id', $videoupdate->id)->update($data);           

                return back()->with('success', 'Video Updated Successfully.');
        }else{
                return back()->with('error', 'Video Id Not Matched');
        }
    }

    public function videoDelete(Request $request){
      $deletevideo = Video::find($request->deleteid);
      if($deletevideo){
        $deletevideo->delete();
        return back()->with('success', 'Video Deleted Successfully');
      }else{
        return back()->with('error', 'Video Id Not Matched');
      }
    }

}
