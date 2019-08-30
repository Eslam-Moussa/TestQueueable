<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Order_site;
use App\Order_site_details;
class OrderUserController extends Controller
{
    public function SingleOrder($id){
        $OrderSite = DB::table('order_site_details')
        ->leftjoin('order_sites','order_site_details.order_id', '=','order_sites.id')
        ->leftjoin('color_prosettings','order_site_details.color_id', '=','color_prosettings.id')
        ->leftjoin('product_sizes','order_site_details.size_id', '=','product_sizes.id')
        ->leftjoin('product_styles','order_site_details.style_id', '=','product_styles.id')
        ->leftjoin('product_sites','order_site_details.product_id', '=','product_sites.id')
        ->select('order_site_details.*',
        'product_sites.product_main_image',
        'product_sites.product_name',
        'order_sites.order_number',
        'color_prosettings.color_name',
        'product_sizes.size_value',
        'product_styles.settingstyle_desc')
        ->where('order_sites.id',$id)
        ->get();
        // dd($OrderSite);
        $Orderfirst = Order_site::where('id', $id)->first();

        $Ordersum = DB::table('order_site_details')
        ->leftjoin('order_sites','order_site_details.order_id', '=','order_sites.id')
        ->where('order_sites.id',$id)
        ->sum('order_site_details.pro_total');

        return view('frontend.OrderUser.singleorder',compact('OrderSite','Ordersum','Orderfirst'));
    }

    public function EditOrder($id, Request $request){
        $OrderSite = DB::table('order_site_details')
        ->leftjoin('order_sites','order_site_details.order_id', '=','order_sites.id')
        ->leftjoin('color_prosettings','order_site_details.color_id', '=','color_prosettings.id')
        ->leftjoin('product_sizes','order_site_details.size_id', '=','product_sizes.id')
        ->leftjoin('product_styles','order_site_details.style_id', '=','product_styles.id')
        ->leftjoin('product_sites','order_site_details.product_id', '=','product_sites.id')
        ->select('order_site_details.*',
        'product_sites.product_main_image',
        'product_sites.product_name',
        'order_sites.order_number',
        'color_prosettings.color_name',
        'product_sizes.size_value',
        'product_styles.settingstyle_desc')
        ->where('order_sites.id',$id)
        ->get();
        $Orderfirst = Order_site::where('id', $id)->first();

        $Ordersum = DB::table('order_site_details')
        ->leftjoin('order_sites','order_site_details.order_id', '=','order_sites.id')
        ->where('order_sites.id',$id)
        ->sum('order_site_details.pro_total');

        if ($request->isMethod('post')) {
        $Orderedit = Order_site_details::find($request->input('order_id'));
        $Orderedit->pro_count = $request->input('qty');
        $Orderedit->save();

        DB::table('order_site_details')
                ->where('id', '=', $Orderedit->id)
                ->update(['pro_total' => $request->input('qty') * $request->input('price')]);

        Session::flash('success', 'تم تعديل طلبك بنجاح');
         return Redirect::back();
        }

        return view('frontend.OrderUser.editorder',compact('OrderSite','Ordersum','Orderfirst'));
    }
}
 