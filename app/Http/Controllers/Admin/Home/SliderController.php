<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    public function GetSlider() {
        $i = 1;
        $slider = Slider_site::where('delete_from_table',0)->get();
        return view('backend.Slider.index',  compact('slider','i'));
    }
 
    public function AddSlider(Request $request) {
         if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'slider_image' => 'required',
            ];
            $messages = [
                'slider_image.required' => 'الصورة مطلوبة',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                    $slider = new Slider_site ();
                    $slider->slider_title = $request->input('slider_title');
                    $slider->slider_link = $request->input('slider_link');
                    $slider->slider_desc = $request->input('slider_desc');
                    if (Input::hasFile('slider_image')) {
                        $file = Input::file('slider_image');
                        $path = 'slid/add/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $slider->slider_image = $path . $filename;
                    }

                    $slider->save();

                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        return view('backend.Slider.add');
    }

    public function EditSlider($id , Request $request) {
        if ($request->isMethod('post')) {

                try {
                    $slider = Slider_site::find($id);
                    $slider->slider_title = $request->input('slider_title');
                    $slider->slider_link = $request->input('slider_link');
                    $slider->slider_desc = $request->input('slider_desc');
                    if (Input::hasFile('slider_image')) {
                        $file = Input::file('slider_image');
                        $path = 'slid/add/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $slider->slider_image = $path . $filename;
                    }

                    $slider->save();

                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back()->withInput(Input::all());
                }
            
        }
         $slider = Slider_site::find($id);
        return view('backend.Slider.edit', compact('slider'));
    }
    

    public function DeleteSlider($id) {
        try {
            DB::table('slider_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

      public function ActiveSlider($id) {
        try {
            DB::table('slider_sites')
                    ->where('id', '=', $id)
                    ->update(['slider_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }

    public function UnActiveSlider($id) {
        try {
            DB::table('slider_sites')
                    ->where('id', '=', $id)
                    ->update(['slider_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
