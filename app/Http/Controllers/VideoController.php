<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function videoList(){
        $videos = Video::where('user_id', Auth::user()->id)->get();
        return view('videolist', compact('videos'));
    }

    public function VideoProcess(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'video' => 'required|mimes:mp4|max:5120',
        ]);
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = $video->getClientOriginalName();
            $video->move(public_path('uploads/videos/'), $filename);

            // Prepare data
            $data = [
                'user_id'=> $request->input('userid'),
                'title' => $request->input('title'),
                'videos' => url('/uploads/videos/' . $filename)
            ];

            Video::insert($data);

            return back()->with('success', 'Video Added Successfully.');
        }

        return back()->with('error', 'No Video File Selected.');
    }

    public function videoUpdate(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        'video' => 'nullable|mimes:mp4|max:5120',
        ]);
        $videoupdate = Video::find($request->video_id);
        if($videoupdate){
            $data = $request->only('title');
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $filename = $video->getClientOriginalName();
                $video->move(public_path('uploads/videos/'), $filename);
                $data['videos'] = url('/uploads/videos/' . $filename);
            }else{
                $data['videos'] = $videoupdate->videos;
            }
                Video::where('id', $videoupdate->id)->update($data);           
                // $videoupdate->update($data);

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
