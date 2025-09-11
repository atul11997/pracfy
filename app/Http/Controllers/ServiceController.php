<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function serviceList(){
        $services = Service::where('user_id', Auth::user()->id)->get();
        return view('servicelist', compact('services'));
    }

    public function serviceEdit($id){
       $findservice = Service::find($id);
       if($findservice){
            return response()->json(['status'=>'success', 'message'=>'Service Detail Show Successfully', 'data'=>$findservice]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Service Id Not Matched']);
       }
       
    }

    public function serviceProcess(Request $request){
        $data = $request->only(['user_id', 'title', 'subtitle', 'description']);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/service/'), $filename);
            $data['image'] = url('/').'/uploads/service/' . $filename; // relative path
        }

        if($request->hasFile('icon')) {
            $image2 = $request->file('icon');
            $filename2 = time().'_'.$image2->getClientOriginalName(); // unique filename
            $image2->move(public_path('uploads/service/'), $filename2);
            $data['icon'] = url('/').'/uploads/service/' . $filename2; // relative path
        }

        Service::insert($data);

        return redirect()->route('service.list')->with('success', 'Service Added Successfully');
    }

    public function serviceUpdate(Request $request){
       $updateservice = Service::where('id', $request->service_id)->first();
       if($updateservice){
        $data = $request->only(['title', 'subtitle', 'description']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName(); // unique filename
            $image->move(public_path('uploads/service/'), $filename);
            $data['image'] = url('/').'/uploads/service/' . $filename; // relative path
        }else{
            $data['image'] = $updateservice->image;
        }
        if($request->hasFile('icon')) {
            $image2 = $request->file('icon');
            $filename2 = time().'_'.$image2->getClientOriginalName(); // unique filename
            $image2->move(public_path('uploads/service/'), $filename2);
            $data['icon'] = url('/').'/uploads/service/' . $filename2; // relative path
        }else{
            $data['icon'] = $updateservice->icon;
        }
        Service::where('id', $updateservice->id)->update($data);
        // $updateservice->update($data);
        return back()->with('success', 'Service Updated Successfully');
       }else{
        return back()->with('error', 'Service Id Not Matched');
       }
    }

    public function serviceDelete(Request $request){
      $deleteservice = Service::find($request->deleteid);
      if($deleteservice){
        $deleteservice->delete();
        return back()->with('success', 'Service Deleted Successfully');
      }else{
        return back()->with('error', 'Service Id Not Matched');
      }
    }
}
