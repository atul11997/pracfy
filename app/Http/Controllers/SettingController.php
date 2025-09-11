<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function themeCustomization(Request $request){
        $setting = Setting::where('user_id', $request->user_id)->first();
        if($setting){
            $data = $request->only('background_color', 'color', 'hover_color', 'section_background_color', 'section_color', 'section_hover_color');
            Setting::where('id', $setting->id)->update($data);
            return back()->with('success', 'Setting Updated Successfully');
        }else{
            $data = $request->only('user_id', 'background_color', 'color', 'hover_color');
            Setting::insert($data);
            return back()->with('success', 'Setting Added Successfully');
        }
        

    }

}
