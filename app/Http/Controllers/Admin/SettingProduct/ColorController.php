<?php

namespace App\Http\Controllers\Admin\SettingProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color_prosetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ColorController extends Controller
{
    public function Index(){ 
        $i = 1;
        $Color = Color_prosetting::where('delete_from_table',0)->get();
           return view('backend.SettingProduct.Color.index',compact('i','Color'));
    }
       
    public function AddNewSettingColor(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Color = new Color_prosetting();
                    $Color->color_name = $request->input('color_name');
                    $Color->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
    }
    
    public function EditNewSettingColor(Request $request) {
        try {
            $Color = Color_prosetting::find($request->input('id'));
            $Color->color_name = $request->input('color_name');
            $Color->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteSettingColor($id) {
        try {
            DB::table('color_prosettings')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveSettingColor($id) {
        try {
            DB::table('color_prosettings')
                    ->where('id', '=', $id)
                    ->update(['settingcolor_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveSettingColor($id) {
        try {
            DB::table('color_prosettings')
                    ->where('id', '=', $id)
                    ->update(['settingcolor_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
