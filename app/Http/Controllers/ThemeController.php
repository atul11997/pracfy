<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;

class ThemeController extends Controller
{
    public function showThemes()
    {
        $themes = ['theme1', 'theme2', 'theme3', 'theme4']; 
        $setting = Setting::where('user_id', Auth::user()->id)->first();
        return view('user.themes.index', compact('themes', 'setting'));
    }

    public function selectTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|string',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if($user){
           $user->update([
            'selected_theme'=>$request->theme
           ]); 
        }

        return redirect()->back()->with('success', 'Theme selected successfully!');
    }
}
