<?php

namespace App\Http\Controllers\Admin\MetroStations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metro_stations;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class StationsController extends Controller
{
    public function Index(){
        $i = 1;
        $Stations = Metro_stations::where('delete_from_table',0)->get();
        return view('backend.Metro.index',compact('i','Stations'));
       }
       
       public function AddNewStations(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Stations = new Metro_stations();
                    $Stations->Metroline_name = $request->input('Metroline_name');
                    $Stations->Stations_name = $request->input('Stations_name');
                    $Stations->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewStations(Request $request) {
        try {
            $Stations = Metro_stations::find($request->input('id'));
            $Stations->Metroline_name = $request->input('Metroline_name');
            $Stations->Stations_name = $request->input('Stations_name');
            $Stations->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteStations($id) {
        try {
            DB::table('metro_stations')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveStations($id) {
        try {
            DB::table('metro_stations')
                    ->where('id', '=', $id)
                    ->update(['Stations_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveStations($id) {
        try {
            DB::table('metro_stations')
                    ->where('id', '=', $id)
                    ->update(['Stations_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
}
