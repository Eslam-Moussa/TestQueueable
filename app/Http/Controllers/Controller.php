<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use App;
use Auth;
use App\WebSite_setting;
use Cart;
use App\Category;
use App\User;
use App\Product_site;
use App\Order_site;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct() {
        
        if (Auth::check()) {
           $userpermission = DB::table('users')
                   ->join('permission_groups', 'users.premission_id', '=', 'permission_groups.id')
                   ->join('permissions', 'permission_groups.id', '=', 'permissions.per_id')
                   ->select('permissions.*')
                   ->where('users.id', Auth::User()->id)
                   ->lists('permissions.per_name');
           View::share('userpermission', $userpermission);
       } 
       
       $setting = WebSite_setting::first();
        View::share('setting', $setting);

        $cart = Cart::getContent();
        $carheadercount = $cart->count();
        View::share('carheadercount', $carheadercount);

        $cartsum = Cart::getTotal();
        View::share('cartsum', $cartsum);

        $Cateheader = Category::where('delete_from_table', 0)->where('cat_active',1)->get();
        View::share('Cateheader', $Cateheader);

        $admincount = User::where('user_type', 1)->where('delete_from_table', 0)->count();
        View::share('admincount', $admincount);

        $Userscount = User::where('user_type', 2)->where('delete_from_table', 0)->count();
        View::share('Userscount', $Userscount);

        $productcount = Product_site::where('delete_from_table', 0)->count();
        View::share('productcount', $productcount);

        $OrderSitecount = Order_site::where('delete_from_table', 0)->count();
        View::share('OrderSitecount', $OrderSitecount);

        $productsite = DB::table('product_sites')
                ->leftjoin('categories','product_sites.category_id', '=','categories.id')
                ->select('product_sites.*', 'categories.cat_name as cat_name')
                ->where('product_sites.delete_from_table', 0)
                ->orderBy('id','desc')
                ->limit(10)
                ->get();

       View::share('productsite', $productsite);

       $i=1;
       View::share('i', $i);
   }
}
