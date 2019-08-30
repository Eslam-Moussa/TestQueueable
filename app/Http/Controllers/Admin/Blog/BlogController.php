<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class BlogController extends Controller
{
    public function AllBlog(){
        $i = 1;
        $Blog = Blog_site::where('delete_from_table',0)->get();
        $Blogcount = Blog_site::where('delete_from_table', 0)->count();
        $Blogcountactive = Blog_site::where('delete_from_table', 0)->where('Blog_active',1)->count();
        $BlogcountUnactive = Blog_site::where('delete_from_table', 0)->where('Blog_active',2)->count();
        return view('backend.Blog.index',compact('i','Blog','Blogcount','Blogcountactive','BlogcountUnactive'));
    }

    public function AddBlog(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'Blog_name' => 'required',
                'Blog_link' => 'required',
                'Blog_desc' => 'required',
                'Blog_keywords' => 'required',
                'Blog_desctwo' => 'required',
              
            ]; 
            $messages = [
                'Blog_name.required' => 'مطلوب أدخال اسم المقال',
                'Blog_link.required' => 'مطلوب أدخال رابط المقال',
                'Blog_desc.required' => 'مطلوب أدخال الوصف',
                'Blog_keywords.required' => 'مطلوب أدخال الكلمات الدلالية',
                'Blog_desctwo.required' => 'مطلوب أدخال الوصف',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $Blog = new Blog_site();
                $Blog->Blog_name = $request->input('Blog_name');
                $Blog->Blog_link = $request->input('Blog_link');
                $Blog->Blog_desc = $request->input('Blog_desc');
                $Blog->Blog_keywords = $request->input('Blog_keywords');
                $Blog->Blog_desctwo = $request->input('Blog_desctwo');
                if (Input::hasFile('Blog_image')) {
                    $file = Input::file('Blog_image');
                    $path = 'Blog/image/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $Blog->Blog_image = $path . $filename;
                }
                $Blog->save();
    
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }
        return view('backend.Blog.add');
    }

    public function EditBlog($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'Blog_name' => 'required',
                'Blog_link' => 'required',
                'Blog_desc' => 'required',
                'Blog_keywords' => 'required',
                'Blog_desctwo' => 'required',
              
            ]; 
            $messages = [
                'Blog_name.required' => 'مطلوب أدخال اسم المقال',
                'Blog_link.required' => 'مطلوب أدخال رابط المقال',
                'Blog_desc.required' => 'مطلوب أدخال الوصف',
                'Blog_keywords.required' => 'مطلوب أدخال الكلمات الدلالية',
                'Blog_desctwo.required' => 'مطلوب أدخال الوصف',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $Blog = Blog_site::find($id);
                $Blog->Blog_name = $request->input('Blog_name');
                $Blog->Blog_link = $request->input('Blog_link');
                $Blog->Blog_desc = $request->input('Blog_desc');
                $Blog->Blog_keywords = $request->input('Blog_keywords');
                $Blog->Blog_desctwo = $request->input('Blog_desctwo');
                if (Input::hasFile('Blog_image')) {
                    $file = Input::file('Blog_image');
                    $path = 'Blog/image/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $Blog->Blog_image = $path . $filename;
                }
                $Blog->save();
    
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }
        $Blog = Blog_site::find($id);
        return view('backend.Blog.edit',compact('Blog'));
    }

    public function DeleteBlog($id) {
        try {
            DB::table('blog_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveBlog($id) {
        try {
            DB::table('blog_sites')
                    ->where('id', '=', $id)
                    ->update(['Blog_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveBlog($id) {
        try {
            DB::table('blog_sites')
                    ->where('id', '=', $id)
                    ->update(['Blog_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
