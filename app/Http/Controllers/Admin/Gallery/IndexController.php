<?php

namespace App\Http\Controllers\Admin\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class IndexController extends Controller
{
    public function IndexCat(){ 
        $i = 1;
        $Gallery = Gallery::where('delete_from_table',0)->get();
        return view('backend.gallery.index',compact('i','Gallery'));
    }
 
    public function AddNewGallery(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Gallery = new Gallery();
                    if (Input::hasFile('gallery_list')) {
                        $file = Input::file('gallery_list');
                        $path = 'gallery/image/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $Gallery->gallery_list = $path . $filename;
                    }
                    $Gallery->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewGallery(Request $request) {
        try {
            $Gallery = Gallery::find($request->input('id'));
            if (Input::hasFile('gallery_list')) {
                $file = Input::file('gallery_list');
                $path = 'gallery/image/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $Gallery->gallery_list = $path . $filename;
            }
            $
            $Gallery->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteGallery($id) {
        try {
            DB::table('galleries')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveGallery($id) {
        try {
            DB::table('galleries')
                    ->where('id', '=', $id)
                    ->update(['gallery_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveGallery($id) {
        try {
            DB::table('galleries')
                    ->where('id', '=', $id)
                    ->update(['gallery_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
