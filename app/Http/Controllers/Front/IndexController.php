<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Slider_site;
use App\Category; 
use App\Product_site;
use App\Poster_site;
class IndexController extends Controller
{
    public function SiteIndex(){
        $sliderfront = Slider_site::where('delete_from_table',0)->where('slider_active',1)->get();
        $OffersPro = DB::table('offer_products')
        ->leftjoin('product_sites','offer_products.product_id', '=','product_sites.id')
        ->select('offer_products.*', 'product_sites.product_slog','product_sites.product_name as product_name','product_sites.product_main_image as product_main_image','product_sites.product_desc as product_desc','product_sites.product_Purch_price as product_Purch_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('offer_products.offer_active',1)
        ->orderby('offer_products.id','desc')
        ->get();
        $Categoryfront = Category::where('delete_from_table', 0)->where('cat_active',1)->get();
        $productsite = DB::table('product_sites')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_sites.*','product_site_datas.Sector_price as Sector_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('product_sites.delete_from_table', 0)
        ->where('product_sites.product_active',1)
        ->groupBy('product_sites.id')
        ->limit(12)
        ->get();
        $poster = Poster_site::first();
        return view('frontend.layouts.home',compact('poster','sliderfront','OffersPro','Categoryfront','productsite'));
    }

    public function FilterHome(Request $request) {
        // dd($request->input('cat_id'));
        $prodectlastsearch = DB::table('product_sites')
        ->leftjoin('categories', 'product_sites.category_id', '=', 'categories.id')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_sites.*', 'categories.cat_name','product_site_datas.Sector_price as Sector_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('product_sites.product_active', 1)
        ->orderBy('product_sites.id', 'desc');

        $prodectlastsearch->where('product_sites.product_name', 'like', '%' . $request->input('keyword') . '%')
          ->where('product_sites.category_id', '=', $request->input('cat_id'));
        

        $prodectlast = $prodectlastsearch->paginate(9);

        $productname = ($request->input('keyword'));
        $mainname = ($request->input('cat_id'));

        $Category = Category::where('delete_from_table', 0)->where('cat_active',1)->get();
        $productcat = DB::table('product_sites')
           ->select('product_sites.product_name','product_sites.product_slog','product_sites.id','product_sites.category_id')
           ->where('product_sites.product_active', 1)
           ->orderBy('product_sites.id','desc')
           ->get();
        return view('frontend.layouts.search', compact('productcat','Category','productname', 'mainname','prodectlast'));
    }

     
} 
