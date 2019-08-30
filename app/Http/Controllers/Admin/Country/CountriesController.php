<?php

namespace App\Http\Controllers\Admin\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class CountriesController extends Controller
{
   public function Index(){
    $i = 1;
    $Country = Country::where('delete_from_table',0)->get();
    $Countrycount = Country::where('delete_from_table', 0)->count();
    $Countrycountactive = Country::where('delete_from_table', 0)->where('country_active',1)->count();
    $CountrycountUnactive = Country::where('delete_from_table', 0)->where('country_active',2)->count();
       return view('backend.Country.index',compact('i','Country','Countrycount','Countrycountactive','CountrycountUnactive'));
   }
   
   public function AddNewCountry(Request $request){
    if ($request->isMethod('post')) {
            try {
                $Count = new Country();
                $Count->country_name = $request->input('country_name');
                $Count->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        
       }
   }

   public function EditNewCountry(Request $request) {
    try {
        $Count = Country::find($request->input('id'));
        $Count->country_name = $request->input('country_name');
        $Count->save();
        Session::flash('success', 'تم التعديل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التعديل');
        return Redirect::back();
    }
}
public function DeleteCountry($id) {
    try {
        DB::table('countries')
                ->where('id', '=', $id)
                ->update(['delete_from_table' => 1]);
        Session::flash('success', 'تم الحذف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الحذف');
        return Redirect::back();
    }
}

public function ActiveCountry($id) {
    try {
        DB::table('countries')
                ->where('id', '=', $id)
                ->update(['country_active' => 1]);
        Session::flash('success', 'تم التفعيل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التفعيل');
        return Redirect::back()->withInput(Input::all());
    }
}

public function UnActiveCountry($id) {
    try {
        DB::table('countries')
                ->where('id', '=', $id)
                ->update(['country_active' => 2]);
        Session::flash('success', 'تم الأيقاف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الأيقاف');
        return Redirect::back()->withInput(Input::all());
    }
}

}
