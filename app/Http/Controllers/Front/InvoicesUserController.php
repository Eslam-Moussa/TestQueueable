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
use App\Invoice;
use App\Country;
use App\City;
use App\Area;
class InvoicesUserController extends Controller
{
    public function SingleInvo($id){
        $OrderSite = DB::table('order_site_details')
        ->leftjoin('invoices','order_site_details.order_id', '=','invoices.order_id')
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
        ->where('invoices.order_id',$id)
        ->get();
        // dd($OrderSite);
        $Invoicefirst = Invoice::where('order_id', $id)->first();

        $Ordersum = DB::table('order_site_details')
        ->leftjoin('order_sites','order_site_details.order_id', '=','order_sites.id')
        ->where('order_sites.id',$id)
        ->sum('order_site_details.pro_total');

        $Country = Country::where('delete_from_table', 0)->where('country_active',1)->get();
        $Cities = City::where('delete_from_table', 0)->where('city_active',1)->get();
        $Area = Area::where('delete_from_table', 0)->where('area_active',1)->get();

        return view('frontend.InvoUser.single',compact('OrderSite','Ordersum','Invoicefirst','Country','Cities','Area'));
    }

    public function SendInvocie($id,Request $request){
        if ($request->isMethod('post')) {
            try {
            $invoice = Invoice::find($id);
            $invoice->country_id = $request->input('country_id');
            $invoice->city_id = $request->input('city_id');
            $invoice->area_id = $request->input('area_id');
            $invoice->user_address = $request->input('user_address');

            if (Input::hasFile('image_receipt')) {
                $file = Input::file('image_receipt');
                $path = 'invoice/images/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $invoice->image_receipt = $path . $filename;
            }

            $invoice->save(); 
   
            Session::flash('success', 'تم الإرسال بنجاح');
            return Redirect::to('/My-invoices');
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الإرسال');
            return Redirect::back()->withInput(Input::all());
        
         }
    }
 }
}
 