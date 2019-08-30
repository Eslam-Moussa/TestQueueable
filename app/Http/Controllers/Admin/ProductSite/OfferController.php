<?php

namespace App\Http\Controllers\Admin\ProductSite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product_site;
use App\Offer_product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class OfferController extends Controller
{
    public function Index(){
        $i = 1;
       $today=date('Y-m-d'); 
       $Product = Product_site::where('delete_from_table',0)->where('product_active',1)->get();
     
        $Offers = DB::table('offer_products')
                ->leftjoin('product_sites','offer_products.product_id', '=','product_sites.id')
                ->select('offer_products.*', 'product_sites.product_name as product_name')
                ->get();

        $OffersFirst = DB::table('offer_products')
        ->leftjoin('product_sites','offer_products.product_id', '=','product_sites.id')
        ->select('offer_products.*', 'product_sites.product_name as product_name')
        ->first();

        // dd($OffersFirst);
               
    //    foreach ($Offers as $off) {
    //      $pro_id = $off->product_id;
    //    } 

       foreach ($Offers as $date) {
        if($date->offer_date_to < $today){
            DB::table('offer_products')
            ->where('id', '=', $date->id)
            ->update(['offer_active' => 2]); 
        }else{
            DB::table('offer_products')
            ->where('id', '=', $date->id)
            ->update(['offer_active' => 1]); 
        }
      } 

        $Offerscount = Offer_product::where('delete_from_table', 0)->count();
        $Offerscountactive = Offer_product::where('delete_from_table', 0)->where('offer_active',1)->count();
        $OfferscountUnactive = Offer_product::where('delete_from_table', 0)->where('offer_active',2)->count();
        return view('backend.Offer.index',compact('Product','OffersFirst','Offers','Offerscount','Offerscountactive','OfferscountUnactive','i'));
    }

    public function AddNewOffer(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Offer = new Offer_product();
                    $Offer->offer_name = $request->input('offer_name');
                    $Offer->product_id = $request->input('product_id');
                    $Offer->price_product = $request->input('price_product');
                    $Offer->offer_date_from = $request->input('offer_date_from');
                    $Offer->offer_date_to = $request->input('offer_date_to');
                    $Offer->offer_count = $request->input('offer_count');
                    $Offer->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
    }
    
    public function EditNewOffer(Request $request) {
        try {
            $Offer = Offer_product::find($request->input('id'));
            $Offer->offer_name = $request->input('offer_name');
            $Offer->product_id = $request->input('product_id');
            $Offer->price_product = $request->input('price_product');
            $Offer->offer_date_from = $request->input('offer_date_from');
            $Offer->offer_date_to = $request->input('offer_date_to');
            $Offer->offer_count = $request->input('offer_count');
            $Offer->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteOffer($id) {
        try {
            DB::table('offer_products')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back(); 
        }
    }
    
    public function ActiveOffer($id) {
        try {
            DB::table('offer_products')
                    ->where('id', '=', $id)
                    ->update(['offer_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveOffer($id) {
        try {
            DB::table('offer_products')
                    ->where('id', '=', $id)
                    ->update(['offer_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    } 
}
