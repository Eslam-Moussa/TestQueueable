<?php

namespace App\Http\Controllers\Admin\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_type;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class OrderTypeController extends Controller
{
       public function Index(){
        $i = 1;
          $OrderType = Order_type::where('delete_from_table',0)->get();

           return view('backend.OrderSite.Type.index',compact('i','OrderType'));
       }
       
       public function AddNewOrderType(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $OrderType = new Order_type();
                    $OrderType->order_type_name = $request->input('order_type_name');
                    $OrderType->order_type_number = $request->input('order_type_number');
                    $OrderType->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewOrderType(Request $request) {
        try {
            $OrderType = Order_type::find($request->input('id'));
            $OrderType->order_type_name = $request->input('order_type_name');
            $OrderType->order_type_number = $request->input('order_type_number');
            $OrderType->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
       public function DeleteOrderType($id) {
        try {
            DB::table('order_types')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
     }
    
    public function ActiveOrderType($id) {
        try {
            DB::table('order_types')
                    ->where('id', '=', $id)
                    ->update(['order_type_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveOrderType($id) {
        try {
            DB::table('order_types')
                    ->where('id', '=', $id)
                    ->update(['order_type_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
} 
