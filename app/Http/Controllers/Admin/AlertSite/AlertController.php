<?php

namespace App\Http\Controllers\Admin\AlertSite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alert_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class AlertController extends Controller
{
    public function IndexAlerts(){
        $i = 1;
        $Alerts = Alert_site::where('delete_from_table',0)->get();
        return view('backend.Alerts.index',compact('i','Alerts'));
       }
       
       public function AddNewAlerts(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Alerts = new Alert_site();
                    $Alerts->alert_title = $request->input('alert_title');
                    $Alerts->alert_desc = $request->input('alert_desc');
                    $Alerts->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewAlerts(Request $request) {
        try {
            $Alerts = Alert_site::find($request->input('id'));
            $Alerts->alert_title = $request->input('alert_title');
            $Alerts->alert_desc = $request->input('alert_desc');
            $Alerts->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteAlerts($id) {
        try {
            DB::table('alert_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveAlerts($id) {
        try {
            DB::table('alert_sites')
                    ->where('id', '=', $id)
                    ->update(['alert_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveAlerts($id) {
        try {
            DB::table('alert_sites')
                    ->where('id', '=', $id)
                    ->update(['alert_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
