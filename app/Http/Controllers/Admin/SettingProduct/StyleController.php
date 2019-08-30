<?php

namespace App\Http\Controllers\Admin\SettingProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product_style;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class StyleController extends Controller
{
    public function Index(){
        $i = 1;
        $Style = Product_style::where('delete_from_table',0)->get();
        $Stylefirst = Product_style::where('delete_from_table',0)->first();
           return view('backend.SettingProduct.Style.index',compact('i','Stylefirst','Style'));
       }
       
       public function AddNewSettingStyle(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Style = new Product_style();
                    $Style->settingstyle_desc = $request->input('settingstyle_desc');

                    if (Input::hasFile('settingstyle_image')) {
                        $file = Input::file('settingstyle_image');
                        $path = 'product/settingstyle/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $Style->settingstyle_image = $path . $filename;
                    }
                    $Style->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewSettingStyle(Request $request) {
        try {
            $Style = Product_style::find($request->input('id'));

            $Style->settingstyle_desc = $request->input('settingstyle_desc');

            if (Input::hasFile('settingstyle_image')) {
            $file = Input::file('settingstyle_image');
            $path = 'product/settingstyle/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $Style->settingstyle_image = $path . $filename;
            }

            $Style->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteSettingStyle($id) {
        try {
            DB::table('product_styles')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveSettingStyle($id) {
        try {
            DB::table('product_styles')
                    ->where('id', '=', $id)
                    ->update(['settingstyle_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveSettingStyle($id) {
        try {
            DB::table('product_styles')
                    ->where('id', '=', $id)
                    ->update(['settingstyle_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
