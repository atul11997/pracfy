<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function faqList(){
        $faqs = FAQ::where('user_id', Auth::user()->id)->get();
        return view('faqlist', compact('faqs'));
    }

    public function faqProcess(Request $request){
        $data = $request->only('user_id', 'question', 'description');
        FAQ::insert($data);
        return back()->with('success', 'FAQ Added Successfully');
    }

    public function faqUpdate(Request $request){
        $faqupdate = FAQ::find($request->question_id);
        if($faqupdate){
            $data = $request->only('question', 'description');
            FAQ::where('id', $faqupdate->id)->update($data);
            // $faqupdate->update($data);
            return back()->with('success', 'FAQ Updated Successfully');
        }else{
            return back()->with('error', 'FAQ Id Not Matched');
        }

    }

    public function faqDelete(Request $request){
      $deletefaq = FAQ::find($request->deleteid);
      if($deletefaq){
        $deletefaq->delete();
        return back()->with('success', 'FAQ Deleted Successfully');
      }else{
        return back()->with('error', 'FAQ Id Not Matched');
      }
    }
}
