<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebSite_setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class SettingController extends Controller
{
   public function IndexSetting(){
       $setting = WebSite_setting::first();
       return view('backend.setting.index', compact('setting'));
   }
   public function AddSettingSite(Request $request) {//Create First Data
    if ($request->isMethod('post')) {
        $setting = new WebSite_setting();
        $setting->sit_title_ar = $request->input('sit_title_ar');
        $setting->sit_address_ar = $request->input('sit_address_ar');
        $setting->sit_phone = $request->input('sit_phone');
        $setting->sit_mail = $request->input('sit_mail');
        $setting->sit_open_ar = $request->input('sit_open_ar');
        $setting->sit_mony = $request->input('sit_mony');
        $setting->sit_footer_desc_ar = $request->input('sit_footer_desc_ar');
        $setting->sit_keywords_ar = $request->input('sit_keywords_ar');
        $setting->sit_desc_ar = $request->input('sit_desc_ar');
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->google = $request->input('google');
        $setting->youtuob = $request->input('youtuob');
        $setting->instgram = $request->input('instgram');
        $setting->snapchat = $request->input('snapchat');
        $setting->linked = $request->input('linked');
        $setting->whatsapp = $request->input('whatsapp');
        $setting->lng = $request->input('lng');
        $setting->lat = $request->input('lat');

        if (Input::hasFile('sit_logo_ar')) {
            $file = Input::file('sit_logo_ar');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_logo_ar = $path . $filename;
        }


        if (Input::hasFile('sit_logofooter_ar')) {
            $file = Input::file('sit_logofooter_ar');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_logofooter_ar = $path . $filename;
        }

        if (Input::hasFile('sit_favicon')) {
            $file = Input::file('sit_favicon');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_favicon = $path . $filename;
        }

        try {
            $setting->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
}

public function EditSettingSite(Request $request) { //Update On Data
        $setting = WebSite_setting::first();
        $setting->sit_title_ar = $request->input('sit_title_ar');
        $setting->sit_address_ar = $request->input('sit_address_ar');
        $setting->sit_phone = $request->input('sit_phone');
        $setting->sit_mail = $request->input('sit_mail');
        $setting->sit_open_ar = $request->input('sit_open_ar');
        $setting->sit_mony = $request->input('sit_mony');
        $setting->sit_footer_desc_ar = $request->input('sit_footer_desc_ar');
        $setting->sit_keywords_ar = $request->input('sit_keywords_ar');
        $setting->sit_desc_ar = $request->input('sit_desc_ar');
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->google = $request->input('google');
        $setting->youtuob = $request->input('youtuob');
        $setting->instgram = $request->input('instgram');
        $setting->snapchat = $request->input('snapchat');
        $setting->linked = $request->input('linked');
        $setting->whatsapp = $request->input('whatsapp');
        $setting->lng = $request->input('lng');
        $setting->lat = $request->input('lat');

        if (Input::hasFile('sit_logo_ar')) {
            $file = Input::file('sit_logo_ar');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_logo_ar = $path . $filename;
        }


        if (Input::hasFile('sit_logofooter_ar')) {
            $file = Input::file('sit_logofooter_ar');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_logofooter_ar = $path . $filename;
        }

        if (Input::hasFile('sit_favicon')) {
            $file = Input::file('sit_favicon');
            $path = 'setting/logo/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->sit_favicon = $path . $filename;
        }
    try {
        $setting->save();
        Session::flash('success', 'تم التعديل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التعديل');
        return Redirect::back();
    }
}
}
 
