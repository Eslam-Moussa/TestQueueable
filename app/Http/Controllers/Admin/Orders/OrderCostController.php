<?php

namespace App\Http\Controllers\Admin\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_cost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class OrderCostController extends Controller
{
    public function IndexCost(){
          $i = 1;
          $Costs = Order_cost::where('delete_from_table',0)->get();
           return view('backend.OrderSite.Costs.index',compact('i','Costs'));
       }
       
       public function AddNewCosts(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Ordercost = new Order_cost();
                    $Ordercost->cost_name = $request->input('cost_name');
                    $Ordercost->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditCosts(Request $request) {
        try {
            $Ordercost = Order_cost::find($request->input('id'));
            $Ordercost->cost_name = $request->input('cost_name');
            $Ordercost->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
       public function DeleteOrderCosts($id) {
        try {
            DB::table('order_costs')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
     }
    
    public function ActiveOrderCosts($id) {
        try {
            DB::table('order_costs')
                    ->where('id', '=', $id)
                    ->update(['cost_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveOrderCosts($id) {
        try {
            DB::table('order_costs')
                    ->where('id', '=', $id)
                    ->update(['cost_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
