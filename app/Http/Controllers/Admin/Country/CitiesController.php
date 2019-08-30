<?php

namespace App\Http\Controllers\Admin\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class CitiesController extends Controller
{
    public function Index(){
        $i = 1;
       $Country = Country::where('delete_from_table',0)->where('country_active',1)->get();
     
       $Cities = DB::table('cities')
                ->leftjoin('countries','cities.country_id', '=','countries.id')
                ->select('cities.*', 'countries.country_name as country_name')
                ->get();

       $Citiesfirst = City::orderBy('id', 'asc')->where('delete_from_table', 0)->first();     

        $Citiescount = City::where('delete_from_table', 0)->count();
        $Citiescountactive = City::where('delete_from_table', 0)->where('city_active',1)->count();
        $CitiescountUnactive = City::where('delete_from_table', 0)->where('city_active',2)->count();
        return view('backend.City.index',compact('Country','Cities','Citiesfirst','Citiescount','Citiescountactive','CitiescountUnactive','i'));
    }

    public function AddNewCity(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $City = new City();
                    $City->city_name = $request->input('city_name');
                    $City->country_id = $request->input('country_id');
                    $City->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
    }
    
    public function EditNewCity(Request $request) {
        try {
            $City = City::find($request->input('id'));
            $City->city_name = $request->input('city_name');
            $City->country_id = $request->input('country_id');
            $City->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteCity($id) {
        try {
            DB::table('cities')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveCity($id) {
        try {
            DB::table('cities')
                    ->where('id', '=', $id)
                    ->update(['city_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveCity($id) {
        try {
            DB::table('cities')
                    ->where('id', '=', $id)
                    ->update(['city_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
