<?php

namespace App\Http\Controllers\Admin\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Order_site;
class OrderSitController extends Controller
{
    public function IndexOrderSite(){
    $i = 1;
    $OrderSite = DB::table('order_sites')
        ->leftjoin('users','order_sites.order_user_id', '=','users.id')
        ->select('order_sites.*','users.name as use_name','users.user_secondname as user_secondname')
        ->where('order_sites.delete_from_table',0)
        ->get();
    // dd($OrderInternal);    

     $OrderSitecount = Order_site::where('delete_from_table', 0)->count();
     $OrderSitecountactive = Order_site::where('delete_from_table', 0)->where('order_active',1)->count();
     $OrderSitecountUnactive = Order_site::where('delete_from_table', 0)->where('order_active',2)->count();
    return view('backend.OrderSite.index',compact('OrderSite','OrderSitecount','OrderSitecountactive','OrderSitecountUnactive'));
  }

  public function OrderStatus(Request $request) {
    try {
        $Order = Order_site::find($request->input('id'));
        $Order->order_status = $request->input('order_status');
        $Order->save();

        DB::table('invoices')
                ->where('order_id', '=', $id)
                ->update(['invoice_status' => $Order->order_statu]);
        Session::flash('success', 'تم الحفظ بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الحفظ');
        return Redirect::back();
    }
}
public function ActiveOrder($id) {
    try {
        DB::table('order_sites')
                ->where('id', '=', $id)
                ->update(['order_active' => 1]);
        Session::flash('success', 'تم التفعيل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التفعيل');
        return Redirect::back()->withInput(Input::all());
    }
}

public function UnActiveOrder($id) {
    try {
        DB::table('order_sites')
                ->where('id', '=', $id)
                ->update(['order_active' => 2]);
        Session::flash('success', 'تم الأيقاف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الأيقاف');
        return Redirect::back()->withInput(Input::all());
    }
}
public function InvoiceSite($id) {

    $orderfirst = DB::table('order_sites')
            ->leftjoin('users', 'order_sites.order_user_id', '=', 'users.id')
            ->leftjoin('invoices', 'order_sites.id', '=', 'invoices.order_id')
            ->leftjoin('countries', 'invoices.country_id', '=', 'countries.id')
            ->leftjoin('cities', 'invoices.city_id', '=', 'cities.id')
            ->leftjoin('areas', 'invoices.area_id', '=', 'areas.id')
            ->select('order_sites.*','users.user_type as user_type',
            'users.email as use_email',
            'users.name as use_name','users.user_phone as user_phone',
            'users.user_secondname as user_secondname',
            'countries.country_name as country_name',
             'cities.city_name as city_name', 'areas.area_name as area_name','invoices.user_address',
             DB::raw('(select SUM(pro_price) from  order_site_details where order_id = order_sites.id) as total_price'))
            ->where('order_sites.id', $id)
            ->first();

    $i = 1; 

    $orderdetails = DB::table('order_site_details')

    ->leftjoin('color_prosettings','order_site_details.color_id', '=','color_prosettings.id')
    ->leftjoin('product_sizes','order_site_details.size_id', '=','product_sizes.id')
    ->leftjoin('product_sites','order_site_details.product_id', '=','product_sites.id')
    ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
    ->join('product_stores','product_sites.id', '=','product_stores.product_id')
    ->select('order_site_details.pro_count','order_site_details.pro_price',
    'order_site_details.pro_price',
    'product_sites.product_name','color_prosettings.color_name','product_sizes.size_value'
    ,'product_site_datas.Sector_price','product_site_datas.Wholesale_price',
    'product_site_datas.Wholesale_price_three')
    ->where('order_site_details.order_id', $id)
    ->get();

    return view('backend.OrderSite.invoice', compact('orderdetails','i', 'orderfirst'));
}
} 
