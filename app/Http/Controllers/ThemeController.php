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
        $themes = ['theme1', 'theme2', 'theme3', 'theme4', 'theme5', 'theme6', 'theme7', 'theme8']; 
        // $setting = Setting::where('user_id', Auth::user()->id)->first();
        return view('user.themes.index', compact('themes'));
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

     public function index()
    {
        // Read current values via helper
        $settings = [
            'primary_color'    => setting('theme.primary_color', '#3498db'),
            'background_color' => setting('theme.background_color', '#ffffff'),
            'font_family'      => setting('theme.font_family', 'Arial'),
            'font_size'        => setting('theme.font_size', '16px'),
            'color'            => setting('theme.color', '#2980b9'),
            'hover_color'      => setting('theme.hover_color', '#2980b9'),
            'active_color'     => setting('theme.active_color', '#1f6fb2'),
            'font_weight'      => setting('theme.font_weight', '400'),
        ];

        return view('user.themes.theme-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'primary_color'    => 'required|string',
            'background_color' => 'required|string',
            'font_family'      => 'required|string',
            'font_size'        => 'required|string',
            'color'            => 'required|string',
            'hover_color'      => 'required|string',
            'active_color'     => 'required|string',
            'font_weight'      => 'required|string',
        ]);

        // Save multiple keys at once
        setting([
            'theme.primary_color'    => $data['primary_color'],
            'theme.background_color' => $data['background_color'],
            'theme.font_family'      => $data['font_family'],
            'theme.font_size'        => $data['font_size'],
            'theme.color'            => $data['color'],
            'theme.hover_color'      => $data['hover_color'],
            'theme.active_color'     => $data['active_color'],
            'theme.font_weight'      => $data['font_weight'],
        ]);
        setting()->save();
        // (Auto-save on shutdown भी है; चाहें तो setting()->save(); call कर दें)
        return back()->with('success', 'Theme settings updated!');
    }

}
