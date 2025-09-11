<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressList(){
        $addreses = Address::where('user_id', Auth::user()->id)->get();
        return view('addresslist', compact('addreses'));
    }

    public function addressProccess(Request $request){
        $data = $request->only(['user_id', 'address', 'city', 'state', 'pincode']);
        Address::insert($data);
        return back()->with('success', 'Address Added Successfully');
    }

    public function addressEdit($id){
       $findaddress = Address::find($id);
       if($findaddress){
            return response()->json(['status'=>'success', 'message'=>'Address Detail Show Successfully', 'data'=>$findaddress]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Address Id Not Matched']);
       }
    }

    public function addressUpdate(Request $request){
        $updateaddress = Address::find($request->address_id);
        if($updateaddress){
            $data = $request->only(['address', 'city', 'state', 'pincode']);
            Address::where('id', $updateaddress->id)->update($data);
            // $updateaddress->update();
            return back()->with('success', 'Address Updated Successfully');
        }else{
            return back()->with('error', 'Address Id Not Matched');
        }
    }

    public function addressDelete(Request $request){
      $deleteaddress = Address::find($request->deleteid);
      if($deleteaddress){
        $deleteaddress->delete();
        return back()->with('success', 'Address Deleted Successfully');
      }else{
        return back()->with('error', 'Address Id Not Matched');
      }
    }
}
