<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Policy_site;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class PolicyController extends Controller
{


    public function IndexPolicy(Request $request){
        if ($request->isMethod('post')) {
            try {
            $polic = new Policy_site();
            $polic->polic_title = $request->input('polic_title');
            $polic->polic_desc = $request->input('polic_desc');
            if (Input::hasFile('polic_image')) {
                $file = Input::file('polic_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $polic->polic_image = $path . $filename;
            }
                $polic->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
        $polic = Policy_site::first();
        return view('backend.Pages.Policy',compact('polic'));
    }

    public function EditPolicy(Request $request){
        if ($request->isMethod('post')) {
            try {
            $polic = Policy_site::first();
            $polic->polic_title = $request->input('polic_title');
            $polic->polic_desc = $request->input('polic_desc');
            if (Input::hasFile('polic_image')) {
                $file = Input::file('polic_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $polic->polic_image = $path . $filename;
            }

                $polic->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }
}
