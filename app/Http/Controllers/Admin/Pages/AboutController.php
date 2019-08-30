<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class AboutController extends Controller
{
    public function IndexAbout(Request $request){
        if ($request->isMethod('post')) {
            try {
            $about = new AboutUs();
            $about->about_title = $request->input('about_title');
            $about->about_desc = $request->input('about_desc');
            if (Input::hasFile('about_image')) {
                $file = Input::file('about_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $about->about_image = $path . $filename;
            }
                $about->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
        $about = AboutUs::first();
        return view('backend.Pages.AboutUs',compact('about'));
    }

    public function EditAbout(Request $request){
        if ($request->isMethod('post')) {
            try {
            $about = AboutUs::first();
            $about->about_title = $request->input('about_title');
            $about->about_desc = $request->input('about_desc');
            if (Input::hasFile('about_image')) {
                $file = Input::file('about_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $about->about_image = $path . $filename;
            }

                $about->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }
}
