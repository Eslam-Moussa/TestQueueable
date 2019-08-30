<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Condition_site;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class ConditionsController extends Controller
{

    public function IndexCondition(Request $request){
        if ($request->isMethod('post')) {
            try {
            $condition = new Condition_site();
            $condition->condition_title = $request->input('condition_title');
            $condition->condition_desc = $request->input('condition_desc');
            if (Input::hasFile('condition_image')) {
                $file = Input::file('condition_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $condition->condition_image = $path . $filename;
            }
                $condition->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        } 
        $condition = Condition_site::first();
        return view('backend.Pages.Condition',compact('condition'));
    }

    public function EditCondition(Request $request){
        if ($request->isMethod('post')) {
            try {
            $condition = Condition_site::first();
            $condition->condition_title = $request->input('condition_title');
            $condition->condition_desc = $request->input('condition_desc');
            if (Input::hasFile('condition_image')) {
                $file = Input::file('condition_image');
                $path = 'about/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $condition->condition_image = $path . $filename;
            }

                $condition->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }
}
