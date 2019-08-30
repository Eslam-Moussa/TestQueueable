<?php

namespace App\Http\Controllers\Admin\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\Area;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class AreasController extends Controller
{
    public function Index(){
    $i=1;
    $Country = Country::where('delete_from_table',0)->where('country_active',1)->get();
        
    $Area = DB::table('areas')
            ->leftjoin('countries','areas.country_id', '=','countries.id')
            ->leftjoin('cities','areas.city_id', '=','cities.id')
            ->select('areas.*', 'countries.country_name as country_name', 'cities.city_name as city_name')
            ->get();
                
    $Areafirst = DB::table('areas')
    ->leftjoin('countries','areas.country_id', '=','countries.id')
    ->leftjoin('cities','areas.city_id', '=','cities.id')
    ->select('areas.*', 'countries.country_name as country_name', 'cities.city_name as city_name')
    ->first();

    $City = City::where('delete_from_table',0)->where('city_active',1)->get();

    $Areacount = Area::where('delete_from_table', 0)->count();
    $Areacountactive = Area::where('delete_from_table', 0)->where('area_active',1)->count();
    $AreacountUnactive = Area::where('delete_from_table', 0)->where('area_active',2)->count();
        return view('backend.Area.index',compact('i','Country','City','Area','Areafirst','Areacount','Areacountactive','AreacountUnactive'));
    }
    public function AddNewArea(Request $request){
        if ($request->isMethod('post')) {
            try {
                $Area = new Area();
                $Area->area_name = $request->input('area_name');
                $Area->shipping_area = $request->input('shipping_area');
                $Area->country_id = $request->input('country_id');
                $Area->city_id = $request->input('city_id');
                $Area->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        
       }
    }
    public function EditNewArea(Request $request) {
        try {
            $Area = Area::find($request->input('id'));
            $Area->area_name = $request->input('area_name');
            $Area->shipping_area = $request->input('shipping_area');
            $Area->country_id = $request->input('country_id');
            $Area->city_id = $request->input('city_id');
            $Area->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteArea($id) {
        try {
            DB::table('areas')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveArea($id) {
        try {
            DB::table('areas')
                    ->where('id', '=', $id)
                    ->update(['area_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveArea($id) {
        try {
            DB::table('areas')
                    ->where('id', '=', $id)
                    ->update(['area_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }

    public function OpenCity(Request $request) {
        if ($request->ajax()) {
            $City = DB::table('cities')->where('delete_from_table',0)->where('city_active',1)->where('country_id', $request->country_id)->get();
            $data = view('backend.Area.ajax-city', compact('City'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function OpenArea(Request $request) {
        if ($request->ajax()) {
            $Area = DB::table('areas')->where('delete_from_table',0)->where('area_active',1)->where('city_id', $request->city_id)->get();
            $data = view('backend.Area.ajax-area', compact('Area'))->render();
            return response()->json(['options' => $data]);
        }
    }
}
