<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
//use App;
use App\Setting;
use App\User;

class SettingsController extends Controller
{

    public function show()
    {
       if (!(\policy(new Setting)->show()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        
        $bannerChoices = array('0' => 'Off', '1' => 'Point n Swing', '2' => 'All Stars');
        $settings = Setting::find(1);
        $updateusername = User::find($settings->updateuserid)->firstname . ' ' . User::find($settings->updateuserid)->lastname;

        return view('setting.editSettings', compact('settings', 'bannerChoices', 'updateusername'));
    }
    
    public function update(Request $request)
    {
       if (!(\policy(new Setting)->update()))
        {
            flash()->error("User '" . \Auth::user()->username . "' does not have sufficient rights for the requested operation")->important();
            return redirect()->back();
        }
        
        $setting = Setting::find(1);
        $this->validate($request, $setting->getUpdateRules());

        $setting->updateuserid = \Auth::user()->id;
        $setting->update($request->all());

        flash()->success("Settings have been successfully updated!");
        
        return \Redirect::route('home');
    }

}
