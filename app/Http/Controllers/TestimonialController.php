<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Models\GoogleReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    public function testimonialList()
    {
        $testimonials = Testimonial::where('user_id', Auth::user()->id)->get();
        return view('testimoniallist', compact('testimonials'));
    }

    public function testimonialProcess(Request $request)
    {
        $data = $request->only('user_id', 'company_name', 'author_name', 'rating', 'designation', 'message');
        if ($request->hasFile('author_image')) {
            $image = $request->file('author_image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/testimonials/'), $filename);
            $data['author_image'] = url('/uploads/testimonials/' . $filename);
        }
        Testimonial::insert($data);
        return back()->with('success', 'Testimonial Added Successfully');
    }

    public function testimonialEdit($id)
    {
        $findtestimonial = Testimonial::find($id);
        if ($findtestimonial) {
            return response()->json(['status' => 'success', 'message' => 'Testimonial Detail Show Successfully', 'data' => $findtestimonial]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Testimonial Id Not Matched']);
        }
    }

    public function testimonialUpdate(Request $request)
    {
        $updatetestimonial = Testimonial::where('id', $request->testimonial_id)->first();
        if ($updatetestimonial) {
            $data = $request->only(['author_name', 'rating', 'designation', 'company_name', 'message']);
            if ($request->hasFile('author_image')) {
                $image = $request->file('author_image');
                $filename = time() . '_' . $image->getClientOriginalName(); // unique filename
                $image->move(public_path('uploads/testimonials/'), $filename);
                $data['author_image'] = url('/') . '/uploads/testimonials/' . $filename; // relative path
            } else {
                $data['author_image'] = $updatetestimonial->author_image;
            }

            Testimonial::where('id', $updatetestimonial->id)->update($data);
            return back()->with('success', 'Testimonial Updated Successfully');
        } else {
            return back()->with('error', 'Testimonial Id Not Matched');
        }
    }

    public function testimonialDelete(Request $request)
    {
        $deletetestimonials = Testimonial::find($request->deleteid);
        if ($deletetestimonials) {
            $deletetestimonials->delete();
            return back()->with('success', 'Testimonial Deleted Successfully');
        } else {
            return back()->with('error', 'Testimonial Id Not Matched');
        }
    }
    public function redirectGoogle()
    {
                config([
                'services.google.client_id' => config('services.google_connect.client_connect_id'),
                'services.google.client_secret' => config('services.google_connect.client_connect_secret'),
                'services.google.redirect' => config('services.google_connect.connect_redirect'),
            ]);
        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/business.manage'])
            ->with(['access_type' => 'offline', 'prompt' => 'consent'])
            ->redirect();
    }

    // Step 2: Handle callback
    public function handleGoogleCallback()
    {
        try {
        config([
            'services.google.client_id' => config('services.google_connect.client_connect_id'),
            'services.google.client_secret' => config('services.google_connect.client_connect_secret'),
            'services.google.redirect' => config('services.google_connect.connect_redirect'),
        ]);
            $googleUser = Socialite::driver('google')->user();
            GoogleReview::updateOrCreate(['user_id'=>Auth::user()->id], [
                'google_id'=>$googleUser->id,
                'google_token'=>$googleUser->token,
                'google_refresh_token'=>$googleUser->refreshToken
            ]);

            return redirect()->route('testimonials.list')->with('success', 'Google account connected successfully.');
        } catch (\Exception $e) {
            return redirect()->route('testimonials.list')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function fetchGoogleReviews()
    {

        $googleReview = GoogleReview::where('user_id', Auth::user()->id)->with('user')->first();
        
        $accessToken = $googleReview->google_token;
        
        // Step 1: Get list of business accounts
        $response = Http::withToken($accessToken)->get('https://mybusinessaccountmanagement.googleapis.com/v1/accounts');
       
     if ($response->failed()) {
            return response()->json([
                'status' => $response->status(),
                'body' => $response->body(),
                'json' => $response->json(),
            ], 400);
        }

        $accounts = $response->json()['accounts'] ?? [];
        if (count($accounts) == 0) {
            return response()->json(['message' => 'No business accounts found.'], 404);
        }

        $accountName = $accounts[0]['name']; // Example: "accounts/1234567890"

        // Step 2: Get locations under account
        $locationsRes = Http::withToken($accessToken)
            ->get("https://mybusinessbusinessinformation.googleapis.com/v1/{$accountName}/locations");

        if ($locationsRes->failed()) {
            return response()->json(['message' => 'Failed to fetch locations.'], 400);
        }

        $locations = $locationsRes->json()['locations'] ?? [];
        if (count($locations) == 0) {
            return response()->json(['message' => 'No locations found.'], 404);
        }

        $locationName = $locations[0]['name'];

        $reviewsRes = Http::withToken($accessToken)
            ->get("https://mybusiness.googleapis.com/v4/{$locationName}/reviews");

        if ($reviewsRes->failed()) {
            return response()->json(['message' => 'Failed to fetch reviews.'], 400);
        }

        $reviews = $reviewsRes->json()['reviews'] ?? [];

        return response()->json(['success' => true, 'reviews' => $reviews]);
    }

    
}
