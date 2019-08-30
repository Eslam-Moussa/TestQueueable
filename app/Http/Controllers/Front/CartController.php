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
use Cart;
use Auth;
use App;
use Carbon\Carbon;
use App\Product_site;
use App\Product_site_data;
use App\Order_site;
use App\Invoice;
class CartController extends Controller
{
    public function CartShow() {
        $i = 1;
        $cart = Cart::getContent();
        $cartsum = Cart::getTotal();

        $today = date("i");

        $user = Auth::user();
        if(!empty($user)) {
            $userCart = DB::table('users')
            ->select('users.id','users.time_cart')
            ->where('users.id', $user->id)
            ->first();
    
            $valuetime = 0;
            foreach ($cart as $value) {
            $valuetime =$value->attributes['time'];
            }
    
            $countdown = $valuetime + $userCart->time_cart ;
    
            if ($today > $countdown) {
               Cart::clear();
            }
        }


        return view('frontend.Cart.index', compact('i', 'cart', 'cartsum'));
    }
    
    public function AddToCart($id, Request $request) {
        $today = date("i");
        $productdata = DB::table('product_sites')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_sites.*','product_site_datas.Sector_price as Sector_price','product_site_datas.Maximum_four as Maximum_four')
        ->where('product_sites.id', $id)
        ->first();
        $cart = Cart::getContent();
        if(($request->input('quantity') > $productdata->Maximum_four)){
            Session::flash('error', 'عفوا .. العدد المطلوب اكبر من المتاح');
            return Redirect::back();  
        }else{

            $addcart = Cart::add(array(
                array(
                    'id' => $productdata->id,
                    'name' => $productdata->product_name,
                    'price' => $productdata->Sector_price,
                    'quantity' => $request->input('quantity'),
                    'attributes' => array(
                        'image' => $productdata->product_main_image,
                        'slogen' => $productdata->product_slog,
                        'category' => $productdata->category_id,
                        'color' => $request->input('pro_color'),
                        'size' => $request->input('pro_size'),
                        'time' =>$today,
                    )
                )
       ));
        Session::flash('success', 'تم أضافه المنتج بنجاح');
         return Redirect::back();
        }
    }   
        

    public function EditQtyCart($id, Request $request) {
        try {
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->input('qty')
                ),
            ));

            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }

    }

    public function CheckOut() {

        $cart = Cart::getContent();

        $cartsum = Cart::getTotal();

        return view('frontend.Cart.checkout', compact('cart','cartsum'));
    }

    public function AddOrder(Request $request) {

        $cart = Cart::getContent();
        $total = Cart::getTotal();
        $cartcount = $cart->count();
        $user = Auth::user();

        $selectlastnum = DB::table('order_sites')->orderBy('id', 'desc')->first();

        if (!empty($selectlastnum)) {
            $randomString = $selectlastnum->order_number + 1;
        } else {
            $randomString = '5001';
        }
        if ($request->isMethod('post')) {
            try {
            $orders = new Order_site();
            $orders->order_number = $randomString;
            $orders->order_product_count = $cartcount;
            $orders->order_total = $total;
            $orders->order_user_id = $user->id;
            $orders->save();

            //invoice
            $invoice = new Invoice();
            $invoice->invoice_number = $randomString;
            $invoice->order_id = $orders->id;
            $invoice->user_id = $user->id;
            $invoice->total_price = $total;
            $invoice->save(); 

            $prods = [];
            foreach ($cart as $value) { 
                $prods['color_id'] = $value->attributes['color'];
                $prods['size_id'] = $value->attributes['size'];
                $prods['pro_price'] = $value->price;
                $prods['pro_count'] = $value->quantity;
                $prods['pro_total'] = $value->quantity * $value->price;
                $prods['product_id'] = $value->id;
                $prods['order_id'] = $orders->id;
                DB::table('order_site_details')->insert($prods);
            }


            Cart::clear();
            Session::flash('success', 'تم أرسال طلبك بنجاح');
            return Redirect::to('/My-orders');
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الإرسال');
            return Redirect::back()->withInput(Input::all());
        
         }
        }
    }

}
 