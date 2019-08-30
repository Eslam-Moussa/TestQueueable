<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\client_type;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ClientTypeController extends Controller
{
    public function Index(){
            $i = 1;
           $Type = client_type::where('delete_from_table',0)->get();
           
           return view('backend.ClientType.index',compact('i','Type'));
       }
       
       public function AddClientType(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Type = new client_type();
                    $Type->clienttyp_name = $request->input('clienttyp_name');
                    $Type->clienttyp_close_order = $request->input('clienttyp_close_order');
                    $Type->clienttyp_cart = $request->input('clienttyp_cart');
                    $Type->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditClientType(Request $request) {
        try {
            $Type = client_type::find($request->input('id'));
            $Type->clienttyp_name = $request->input('clienttyp_name');
            $Type->clienttyp_close_order = $request->input('clienttyp_close_order');
            $Type->clienttyp_cart = $request->input('clienttyp_cart');
            $Type->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteClientType($id) {
        try {
            DB::table('client_types')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveClientType($id) {
        try {
            DB::table('client_types')
                    ->where('id', '=', $id)
                    ->update(['clienttyp_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveClientType($id) {
        try {
            DB::table('client_types')
                    ->where('id', '=', $id)
                    ->update(['clienttyp_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
