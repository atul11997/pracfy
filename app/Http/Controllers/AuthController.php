<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

public function registerProcess(Request $request)
{
    // Collect data from request
    $data = $request->only(['name', 'email', 'phone', 'address', 'city', 'state']); 

    // Extract last 3 digits from phone number
    $lastThreeDigits = substr($request->phone, -3);

    // Default password hash
    $data['password'] = Hash::make($request->password);

    // Split full name and take only first word (first name)
    $explodename = explode(' ', trim($request->name)); // Added trim()
    $firstName = strtolower($explodename[0]); // Use lowercase to avoid duplicate case-insensitive usernames

    // Build initial username
    $username = $firstName . '@' . $lastThreeDigits;

    // Ensure uniqueness
    $originalUsername = $username;
    $counter = 1;
    while (User::where('username', $username)->exists()) {
        $username = $originalUsername . $counter;
        $counter++;
    }

    $data['username'] = $username;

    // Save to database
    User::insert($data); // Changed to `create` assuming `User` model has `$fillable`

    return redirect()->route('login')->with('success', 'Admin Registered Successfully');
}


    public function login(){
        return view('login');
    }

    public function Authenticate(Request $request){
        $remember = $request->has('remember'); // true if checkbox is checked

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remember)) {
            $request->session()->regenerate(); // prevent session fixation
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function getProfile($id){
       $user = User::find($id);
       if(!$user){
        Auth::logout();
        return redirect()->route('login')->with('error', 'Id Not Matched');
       }
       return view('profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find($request->userid);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'dr_dob' => 'nullable|date',
            'phone' => 'nullable|numeric|digits:10',
            'alternate_phone' => 'nullable|numeric|digits:10',
            'clinic_name' => 'nullable|string',
            'telephone_number' => 'nullable|numeric',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'pincode' => 'nullable|string',
            'doctor_photo' => 'nullable|image|max:2048',
            'clinic_logo' => 'nullable|image|max:2048',
            'clinic_photo' => 'nullable|image|max:2048',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkdin_link' => 'nullable|url',
        ]);

        $validated = array_merge($validated, $request->only([
            'address_map_link',
            'clinic_open_from',
            'clinic_open_to',
            'closed_clinic',
            'clinic_open_time',
            'clinic_close_time',
            'half_day',
            'time_of_half_day_from',
            'time_of_half_day_to',
        ]));

       
        if ($request->hasFile('doctor_photo')) {
            $image = $request->file('doctor_photo');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/profile/'), $filename);
            $validated['photo'] = url('/uploads/profile/'.$filename);
        }

        if ($request->hasFile('clinic_logo')) {
            $image = $request->file('clinic_logo');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/profile/'), $filename);
            $validated['clinic_logo'] = url('/uploads/profile/'.$filename);
        }

        if ($request->hasFile('clinic_photo')) {
            $image = $request->file('clinic_photo');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/profile/'), $filename);
            $validated['clinic_photo'] = url('/uploads/profile/'.$filename);
        }
       
        $tempemail = $user->email;
        User::where('id', $user->id)->update($validated);
        if($user->email != $tempemail){
            Auth::logout(); // Logout user
            return redirect()->route('login')->with('success', 'Profile updated successfully.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function signOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function redirectToGoogle (){
        return Socialite::driver('google')->redirect();
    }

     public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();
            $lastThreeDigits = substr($user->id, -3);
            $explodename = explode(' ', trim($user->name)); // Added trim()
            $firstName = strtolower($explodename[0]); 
            $username = $firstName.'@'.$lastThreeDigits;
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

         

                Auth::login($finduser);

        

                return redirect()->intended('dashboard');

         

            }else{

                $newUser = User::updateOrCreate(['email' => $user->email],[

                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy'),
                        'username' => $username
                    ]);

                Auth::login($newUser);

        

                return redirect()->intended('dashboard');

            }

        

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }


}
