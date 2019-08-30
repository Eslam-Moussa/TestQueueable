<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CatController extends Controller
{
    public function IndexCat(){ 
        $i = 1;
        $Category = Category::where('delete_from_table',0)->get();
        $Categorycount = Category::where('delete_from_table', 0)->count();
        $Categorycountactive = Category::where('delete_from_table', 0)->where('cat_active',1)->count();
        $CategorycountUnactive = Category::where('delete_from_table', 0)->where('cat_active',2)->count();
        return view('backend.Category.index',compact('i','Category','Categorycount','Categorycountactive','CategorycountUnactive'));
    }

    public function AddNewCategory(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Cat = new Category();
                    $Cat->cat_name = $request->input('cat_name');
                    $Cat->cat_slug = Str::slug($request->cat_name, '-');
                    $Cat->cat_desc = $request->input('cat_desc');
                    if (Input::hasFile('cat_image')) {
                        $file = Input::file('cat_image');
                        $path = 'category/image/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $Cat->cat_image = $path . $filename;
                    }
                    $Cat->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewCategory(Request $request) {
        try {
            $Cat = Category::find($request->input('id'));
            $Cat->cat_name = $request->input('cat_name');
            $Cat->cat_slug = Str::slug($request->cat_name, '-');
            $Cat->cat_desc = $request->input('cat_desc');
            if (Input::hasFile('cat_image')) {
            $file = Input::file('cat_image');
            $path = 'category/image/';
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $Cat->cat_image = $path . $filename;
            }
            $Cat->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteCategory($id) {
        try {
            DB::table('categories')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveCategory($id) {
        try {
            DB::table('categories')
                    ->where('id', '=', $id)
                    ->update(['cat_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveCategory($id) {
        try {
            DB::table('categories')
                    ->where('id', '=', $id)
                    ->update(['cat_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
