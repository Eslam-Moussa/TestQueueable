<?php

namespace App\Http\Controllers\Admin\SettingProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product_size;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class SizeController extends Controller
{
    public function Index(){
        $i = 1;
        $Size = Product_size::where('delete_from_table',0)->get();
        $Sizefirst = Product_size::where('delete_from_table',0)->first();
           return view('backend.SettingProduct.Size.index',compact('i','Sizefirst','Size'));
    }
       
    public function AddNewSettingSize(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Size = new Product_size();
                    $Size->size_type = $request->input('size_type');
                    $Size->size_value = $request->input('size_value');
                    $Size->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
    }
    
    public function EditNewSettingSize(Request $request) {
        try {
            $Size = Product_size::find($request->input('id'));
            $Size->size_type = $request->input('size_type');
            $Size->size_value = $request->input('size_value');
            $Size->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteSettingSize($id) {
        try {
            DB::table('product_sizes')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveSettingSize($id) {
        try {
            DB::table('product_sizes')
                    ->where('id', '=', $id)
                    ->update(['settingsize_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveSettingSize($id) {
        try {
            DB::table('product_sizes')
                    ->where('id', '=', $id)
                    ->update(['settingsize_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
