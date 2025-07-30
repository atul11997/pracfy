<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use App\Models\Setting;
use App\Helpers\URLToLatLong;


class SiteController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }
        $theme = $user->selected_theme ?? 'theme1';
        if (empty($user->address_map_link)) {
            return back()->with('error', 'Please set the address map link in your profile.');
        }

        $latlong = URLToLatLong::extractLatLngFromShortUrl($user->address_map_link);
        
        if (empty($latlong)) {
            return back()->with('error', 'Invalid Address Map Link. Please provide a correct google maps link.');
        }
        if($theme == 'theme3'){
            $doctors = $user->doctors()->with('department')->latest()->take(4)->get();
        }elseif($theme == 'theme4'){
           $doctors = $user->doctors()->latest()->take(3)->get(); 
        }elseif($theme == 'theme2'){
           $doctors = $user->doctors()->latest()->take(4)->get(); 
        }elseif($theme == 'theme1'){
            $setting = Setting::where('user_id', $user->id)->first();
           $doctors = $user->doctors()->latest()->take(4)->get(); 
        }
        $pages = $user->pages()->where('status', 0)->get()->keyBy(function($item){
                 return strtolower($item->page_name);
        });
        return view("frontend.themes.$theme.index", [
            'user' => $user,
            'banners' => $user->banners,
            'pages' => $pages,
            'abouts' => $user->about,
            'setting' => $setting??null,
            'latlong' => $latlong,
            'services' => $user->service()->latest()->take(6)->get(),
            'blogs' => $user->blog()->latest()->take(3)->get(),
            'faqs' => $user->faq()->latest()->take(5)->get(),
            'testimonials' => $user->testimonial()->latest()->take(3)->get(),
            'departments' => $user->departments()->latest()->take(6)->get(),
            'doctors' => $doctors,
            'galleries' => $user->gallery()->latest()->take(6)->get(),
            'videos' => $user->video()->latest()->take(3)->get(),
        ]);
    }


    public function addEnquiry(Request $request)
    {
        $data = $request->only('name', 'email', 'subject', 'message');
        Enquiry::insert($data);
        Mail::to($data['email'])->send(new ContactForm($data));
        return response()->json(['status' => 'success', 'message' => 'Enquiry Added Successfully', 200]);
    }

    //     public function addEnquiry(Request $request)
    // {
    //     $data = $request->only('name', 'email', 'subject', 'message');

    //     Enquiry::insert($data);

    //     // Send email asynchronously
    //     event(new ContactFormEmail($data['email']));

    //     return response()->json(['status'=>'success', 'message'=>'Enquiry Added Successfully'], 200);
    // }

    public function userIndex(){
        return view('user_frontend.index');
    }
}
