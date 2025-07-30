<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function pageList(){
        $pages = Page::where('user_id', Auth::user()->id)->get();
        return view('pagelist', compact('pages'));
    }

    public function pageProcess(Request $request){
        $data = $request->only('user_id', 'page_name', 'section_title');
        Page::insert($data);
        return back()->with('success', 'Page Added Successfully');
    }

    public function editPage($id){
       $findpage = Page::find($id);
       if($findpage){
            return response()->json(['status'=>'success', 'message'=>'Page Detail Show Successfully', 'data'=>$findpage]);
       }else{
            return response()->json(['status'=>'error', 'message'=>'Page Id Not Matched']);
       }
    }

    public function updatePage(Request $request){
       $updatepage = Page::where('id', $request->page_id)->first();
       if($updatepage){
        $data = $request->only(['page_name', 'section_title', 'section_sub_title']);
        Page::where('id', $updatepage->id)->update($data);
        return back()->with('success', 'Page Updated Successfully');
       }else{
        return back()->with('error', 'Page Id Not Matched');
       }
    }

    public function statusChangePage($id, $status){
      $statuschangepage = Page::find($id);
      if($statuschangepage){
        Page::where('id', $id)->update(['status'=>$status]);
        return back()->with('success', 'Page Status Change Successfully');
      }else{
        return back()->with('error', 'Page Id Not Matched');
      }
    }
}
