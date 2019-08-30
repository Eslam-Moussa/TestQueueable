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
use App\User;
use App\Country;
use App\City;
use App\Area;
use App\Favourit_product;
use Auth;
class AccountUserController extends Controller
{
    public function Profile(Request $request){
        $user = Auth::User();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required',
            ];
            $messages = [
                'name.required' => 'مطلوب ادخال الأسم',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else { 
                try {
                    $client = User::find($user->id);
                    $client->name = $request->input('name');
                    $client->email = $request->input('email');
                    $client->user_phone = $request->input('user_phone');
                    $client->country_id = $request->input('country_id');
                    $client->city_id = $request->input('city_id');
                    $client->area_id = $request->input('area_id');
                    $client->user_address = $request->input('user_address');
                    $client->payment_methoud = $request->input('payment_methoud');

                    if (!empty($request->input('password'))) {
                        $client->password = bcrypt($request->input('password'));
                    }

                    if (Input::hasFile('user_photo')) {
                        $file = Input::file('user_photo');
                        $path = 'uploaduser/images/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $client->user_photo = $path . $filename;
                    }
                    $client->user_type = 2;

                    $client->save();
                    Session::flash('success', 'تم التعديل بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم التعديل');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        } 
        $Country = Country::where('delete_from_table', 0)->where('country_active',1)->get();
        $Cities = City::where('delete_from_table', 0)->where('city_active',1)->get();
        $Area = Area::where('delete_from_table', 0)->where('area_active',1)->get();
        return view('frontend.AccountUser.profile',compact('Country','Cities','Area','user'));
    }

    public function Order(){
        $user = Auth::user();
        $myorder = DB::table('order_sites')->where('order_user_id',$user->id)->orderBy('id', 'desc')->paginate(6);
        return view('frontend.AccountUser.order',compact('myorder'));
    }


    public function Invoices(){
        $user = Auth::user();
        $myinvoice = DB::table('invoices')->where('user_id',$user->id)->orderBy('id', 'desc')->paginate(6);
        return view('frontend.AccountUser.invoices',compact('myinvoice'));
    }

    public function FavUser(){
        $user = Auth::user();
        $prodectfav = DB::table('favourit_products')
        ->leftjoin('product_sites', 'favourit_products.product_id', '=', 'product_sites.id')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_sites.*','favourit_products.id as fav_id','product_site_datas.Sector_price as Sector_price', DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('favourit_products.user_id', '=', $user->id)
        ->where('product_sites.product_active', 1)
        ->paginate(12);
        // dd($prodectrelated);
        return view('frontend.AccountUser.myfav',compact('prodectfav'));
    }

    public function DeleteFavUser($id) {
        try {
            Favourit_product::find($id)->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
}
