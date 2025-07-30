<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function galleryList()
    {
        $photos = Gallery::where('user_id', Auth::user()->id)->get();
        return view('gallery', compact('photos'));
    }

    public function galleryProcess(Request $request)
    {

        // Check if files are uploaded
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');

            // Limit to 5 files
            if (count($photos) > 5) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You can upload a maximum of 5 images at a time.'
                ], 422); 
            }

            foreach ($photos as $photo) {
                // Create unique filename
                $filename = time() . '_' . $photo->getClientOriginalName();

                // Move original image without compression
                $photo->move(public_path('uploads/photos'), $filename);
                $data = $request->only('user_id');
                // Save image URL to DB
                $data['photos_upload'] = url('/uploads/photos/' . $filename);
                Gallery::insert($data);
            }

            return response()->json(['status'=>'success', 'message' => 'Uploaded Successfully.']);
        }

        return response()->json(['error' => 'No Photos Found.'], 400);
    }

    public function deleteGallery(Request $request){
      $deletegallery = Gallery::find($request->deleteid);
      if($deletegallery){
        $deletegallery->delete();
        return back()->with('success', 'Photo Deleted Successfully');
      }else{
        return back()->with('error', 'Gallery Id Not Matched');
      }
    }
}
