<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Jobs\ProcessOrderThumbnails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Main_store;
use App\Order_type;
use App\Order_internal;
use App\Order_internal_detail;
use App\Product_site;
use App\Color_prosetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Cookie;
use App\Order_cost;
use Auth;
use Carbon\Carbon;
class OrderInternalController extends Controller
{
    public function IndexOrderInternal(){
        $i = 1;
        $OrderInternal = DB::table('order_internal_details')
            ->leftjoin('order_internals','order_internal_details.order_internal_id', '=','order_internals.id')
            ->leftjoin('users','order_internals.order_user_id', '=','users.id')
            ->select('order_internals.*','users.name as use_name','users.user_secondname as user_secondname',DB::raw('(select SUM(pro_price_total) from  order_internal_details where order_internal_id = order_internals.id) as total_price'))
            ->where('order_internals.delete_from_table',0)
            ->orderBy('order_internals.id','desc')
            ->groupBy('order_internals.id')
            ->get();
        // dd($OrderInternal);     

    $OrderInternalcount = Order_internal::where('delete_from_table', 0)->where('order_internals.status',1)->count();
    $OrderInternalcountactive = Order_internal::where('delete_from_table', 0)->where('order_internals.status',1)->count();
    $OrderInternalcountUnactive = Order_internal::where('delete_from_table', 0)->where('order_internals.status',2)->count();

    $admin_id = Auth::user();
 
    $checked = DB::table('order_internals')->where('admin_id',$admin_id->id)->where('status',0)->orderBy('id', 'desc')->first();

        return view('backend.OrderAdmin.index',compact('OrderInternal','OrderInternalcount','OrderInternalcountactive','OrderInternalcountUnactive','checked'));
    }

    public function createNewOrder(Request $request){
        $admin_id = Auth::user();

         $selectlastnumtwo = DB::table('order_internals')->orderBy('id', 'desc')->first();  
         if (!empty($selectlastnumtwo)){
            $randomString = $selectlastnumtwo->order_number + 1;
            }else {
            $randomString = '1001';
            }
        try {
            $order = new Order_internal();
            $order->order_number = $randomString ;
            $order->admin_id = $admin_id->id ;
            $order->save(); 
    
            return Redirect('admin/AddOrderInternal/'.$order->id);
        } catch (\Exception $ex) {
    
            return Redirect::back()->withInput(Input::all());
         }
                
    }

    public function AddOrderInternal($id,Request $request){ 
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                'order_date' => 'required',
                'order_user_id' => 'required',
               
            ];  
            $messages = [
                'order_date.required' => 'حقل مطلوب',
                'order_user_id.required' => 'حقل مطلوب',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                
                
                $order = Order_internal::find($id);
                $order->order_date = $request->input('order_date');
                $order->order_admin_name = $request->input('order_admin_name');
                $order->order_user_id = $request->input('order_user_id');
                $order->save(); 
               
                if($request->input('order_user_id') == 0){
                $user = new User();
                $user->name = $request->input('new_client');
                $user->email = 'null';
                $user->password = 123456;
                $user->user_phone = 02;
                $user->user_type = 2;
                $user->save();

                DB::table('order_internals')
                ->where('id', '=', $order->id)
                ->update(['order_user_id' => $user->id]);

                }

                // if (is_array(Input::get('stored_id_two'))) {
                //     $deatils = [];
                //     foreach (Input::get('stored_id_two') as $key => $feature) {
    
                //         $deatils[] = [
                //             'order_internal_id' => $order->id,
                //             'stored_id' => Input::get('stored_id_two')[$key],
                //             'prodect_id' => Input::get('prodect_id_two')[$key],
                //             'product_parcode' => Input::get('product_parcode_two')[$key],
                //             'color_id' => Input::get('color_id_two')[$key],
                //             'style_id' => Input::get('style_id')[$key],
                //             'size_id' => Input::get('size_id')[$key],
                //             'number_size' => Input::get('number_size_two')[$key],
                //             'pro_count' => Input::get('pro_count')[$key],
                //             'pro_price' => Input::get('pro_price')[$key],
                //             'pro_price_total' => Input::get('pro_price_total')[$key],
                //         ];
                      
                //     }
                    
                        
                //     DB::table('order_internal_details')->insert($deatils);
                // }

              

             DB::table('order_internals')
                        ->where('id', '=', $order->id)
                        ->update(['status' => 1]); 
            
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect('admin/OrderInternal');
            
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back()->withInput(Input::all());
            
            } 
         
            }
          
            $StoreProShow = DB::table('product_sites')
            ->join('product_stores','product_sites.id', '=','product_stores.product_id')
            ->join('main_stores','product_stores.store_id', '=','main_stores.id')
            ->join('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->join('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->join('product_site_datas','product_stores.size_id', '=','product_site_datas.product_sizes_id')
            ->join('product_site_sizes','product_stores.size_id', '=','product_site_sizes.size_value_id')
            ->select('product_sites.id',
            'product_sites.product_name',
            'product_stores.current',
            'product_stores.store_id',
            'product_stores.color_id',
            'product_stores.size_id',
            'main_stores.store_name',
            'color_prosettings.color_name',
            'product_sizes.size_value',
            'product_site_sizes.size_number',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_three')
            ->where('product_sites.product_active',1)
            ->where('product_sites.delete_from_table',0)
            ->orderby('product_sites.id','desc')
            ->limit(10)
            ->get();
        $order = Order_internal::find($id);
        
        $OrderDetails = DB::table('order_internal_details')
        ->leftjoin('product_sites','order_internal_details.prodect_id', '=','product_sites.id')
        ->leftjoin('main_stores','order_internal_details.stored_id', '=','main_stores.id')
        ->leftjoin('product_stores','main_stores.id', '=','product_stores.store_id')
        ->leftjoin('color_prosettings','order_internal_details.color_id', '=','color_prosettings.id')
        ->leftjoin('product_sizes','order_internal_details.size_id', '=','product_sizes.id')
        ->leftjoin('product_site_datas','order_internal_details.size_id', '=','product_site_datas.product_sizes_id')
        ->leftjoin('product_site_sizes','order_internal_details.size_id', '=','product_site_sizes.size_value_id')
          ->select('order_internal_details.*','product_sites.id',
          'product_sites.product_name',
          'product_stores.current',
          'product_stores.store_id',
          'product_stores.color_id',
          'product_stores.size_id',
          'main_stores.store_name',
          'color_prosettings.color_name',
          'product_sizes.size_value',
          'product_site_sizes.size_number',
          'product_site_datas.Main_bar_code',
          'product_site_datas.Main_bar_code_two',
          'product_site_datas.Sector_price',
          'product_site_datas.Wholesale_price',
          'product_site_datas.Wholesale_price_two',
          'product_site_datas.Wholesale_price_three',
          'order_internal_details.id as details_id')
        ->where('order_internal_details.order_internal_id',$order->id)
        ->where('order_internal_details.delete_from_table',0)
        ->groupBy('order_internal_details.id')
        ->get();
        $UserSite = User::where('user_type', 2)->where('delete_from_table', 0)->where('user_active',1)->get();
        $stores = Main_store::where('delete_from_table',0)->where('store_active',1)->get();
        $ColorSetting = Color_prosetting::where('delete_from_table',0)->where('settingcolor_active',1)->get();
        return view('backend.OrderTwo.add',compact('OrderDetails','UserSite','stores','ColorSetting','order','StoreProShow'));
    } 

    public function UpdateCountOrder(Request $request){

        $OrderTypeFirst = DB::table('order_types')->where('order_type_active',1)->where('id',1)->first(); //6
        $OrderTypeTwo = DB::table('order_types')->where('order_type_active',1)->where('id',2)->first(); //10
        $OrderTypeThree = DB::table('order_types')->where('order_type_active',1)->where('id',3)->first(); //20
        $OrderTypefour = DB::table('order_types')->where('order_type_active',1)->where('id',4)->first(); //100
        
        $orderfirst = DB::table('order_internal_details')
                        ->where('id', '=', $request->input('id'))
                        ->first();
                        
                         

        $updatefirst =  DB::table('product_stores')
                    ->where('product_id', '=', $orderfirst->prodect_id)
                    ->where('color_id', '=', $orderfirst->color_id)
                    ->first();

        $sizedatafirst =  DB::table('product_site_sizes')
        ->where('product_id', '=', $orderfirst->prodect_id)
        ->where('product_color_id', '=', $orderfirst->color_id)
        ->first();  
        
        
        $datafirst =  DB::table('product_site_datas')
        ->where('product_id', '=', $orderfirst->prodect_id)
        ->where('color_id', '=', $orderfirst->color_id)
        ->where('product_sizes_id', '=', $orderfirst->size_id)
        ->first(); 
        // dd($datafirst);
        

          if($request->input('pro_count') > $updatefirst->current && $request->input('pro_count') > $orderfirst->pro_count){
            Session::flash('error', 'يجب ان يكون العدد المطلوب اقل من المتاح فى المخزن');
            return Redirect::back();

           }elseif($request->input('pro_count') > $datafirst->Maximum_four){
            Session::flash('error', 'يجب ان يكون العدد المطلوب اقل من الحد الأقصى للطلب');
            return Redirect::back();
           }elseif($request->input('pro_count') < 0){
                Session::flash('error', ' يجب أدخال قيمه اكبر من 0');
                return Redirect::back();
            }else{
            $Count = Order_internal_detail::find($request->input('id'));
            $Count->pro_count = $request->input('pro_count');
            $Count->save();

            if($Count->pro_count < $orderfirst->pro_count){
                
                $result = $orderfirst->pro_count - $Count->pro_count ;

                $update =  DB::table('product_stores')
                ->where('product_id', '=', $Count->prodect_id)
                ->where('color_id', '=', $Count->color_id)
                ->where('size_id', '=', $Count->size_id)
                ->first(); 

                $resulttwo = $update->Drawn - $result;

                DB::table('product_stores')
                ->where('product_id', '=', $Count->prodect_id)
                ->where('color_id', '=', $Count->color_id)
                ->where('size_id', '=', $Count->size_id)
                ->update(['Drawn' =>$resulttwo]);

                $updatetwo =  DB::table('product_stores')
                ->where('product_id', '=', $Count->prodect_id)
                ->where('color_id', '=', $Count->color_id)
                ->where('size_id', '=', $Count->size_id)
                ->first(); 

                DB::table('product_stores')
                ->where('product_id', '=', $Count->prodect_id)
                ->where('color_id', '=', $Count->color_id)
                ->where('size_id', '=', $Count->size_id)
                ->update(['current' =>$updatetwo->size_number - $updatetwo->Drawn]);

                $updatethree =  DB::table('product_stores')
                ->where('product_id', '=', $Count->prodect_id)
                ->where('color_id', '=', $Count->color_id)
                ->where('size_id', '=', $Count->size_id)
                ->first(); 

                DB::table('product_site_sizes')
                ->where('product_id', '=', $updatethree->product_id)
                ->where('size_value_id', '=', $updatethree->size_id)
                ->where('product_color_id', '=', $updatethree->color_id)
                ->update(['size_number' => $updatethree->current]);

                DB::table('order_internal_details')
                ->where('prodect_id',$Count->prodect_id)
                ->where('color_id',$Count->color_id)
                ->where('size_id',$Count->size_id)
                ->update(['number_size' => $updatethree->current]);

                $detailsfirsttwo = DB::table('order_internal_details')
                ->where('prodect_id',$Count->prodect_id)
                ->where('color_id',$Count->color_id)
                ->where('size_id',$Count->size_id)
                ->where('id', '=', $Count->id)
                ->first();

               if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeFirst->order_type_number){
                    $price = $datafirst->Wholesale_price;
                    DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                 }
 
                 if(!empty($OrderTypeTwo->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeTwo->order_type_number){
                     $price = $datafirst->Wholesale_price_two;
                     DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                  }
 
                  if(!empty($OrderTypeThree->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeThree->order_type_number){
                     $price = $datafirst->Wholesale_price_three;
                     DB::table('order_internal_details')
                     ->where('id', '=', $detailsfirsttwo->id)
                     ->update(['pro_price' => $price]);
                  }
 
                  if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count <= $OrderTypeFirst->order_type_number){
                     $price = $datafirst->Sector_price;
                     DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                     
                  }

                $detailsfirsthree = DB::table('order_internal_details')
                ->where('prodect_id',$Count->prodect_id)
                ->where('color_id',$Count->color_id)
                ->where('size_id',$Count->size_id)
                ->where('id', '=', $Count->id)
                ->first();

                DB::table('order_internal_details')
                ->where('id', '=', $detailsfirsthree->id)
                ->update(['pro_price_total' => $detailsfirsthree->pro_price * $detailsfirsthree->pro_count]);

                Session::flash('success', 'تم التعديل بنجاح');
                return Redirect::back();
            
                Session::flash('error', 'لم يتم التعديل');
                return Redirect::back();
         }else{
            $update =  DB::table('product_stores')
            ->where('product_id', '=', $Count->prodect_id)
            ->where('size_id', '=', $Count->size_id)
            ->where('color_id', '=', $Count->color_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $Count->prodect_id)
            ->where('color_id', '=', $Count->color_id)
            ->where('size_id', '=', $Count->size_id)
            ->update(['Drawn' =>$Count->pro_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $Count->prodect_id)
            ->where('color_id', '=', $Count->color_id)
            ->where('size_id', '=', $Count->size_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $Count->prodect_id)
            ->where('color_id', '=', $Count->color_id)
            ->where('size_id', '=', $Count->size_id)
            ->update(['current' =>$updatetwo->size_number - $updatetwo->Drawn]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $Count->prodect_id)
            ->where('color_id', '=', $Count->color_id)
            ->first(); 

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->where('product_color_id', '=', $updatethree->color_id)
            ->update(['size_number' => $updatethree->current]);

            DB::table('order_internal_details')
                ->where('prodect_id',$Count->prodect_id)
                ->where('color_id',$Count->color_id)
                ->where('size_id',$Count->size_id)
                ->update(['number_size' => $updatethree->current]);

            $detailsfirsttwo = DB::table('order_internal_details')
            ->where('prodect_id',$Count->prodect_id)
            ->where('color_id',$Count->color_id)
            ->where('size_id',$Count->size_id)
            ->where('id', '=', $Count->id)
            ->first();

                
                if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeFirst->order_type_number){
                    $price = $datafirst->Wholesale_price;
                    DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                 }
 
                 if(!empty($OrderTypeTwo->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeTwo->order_type_number){
                      $price = $datafirst->Wholesale_price_two;
                     DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                  }
 
                  if(!empty($OrderTypeThree->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeThree->order_type_number){
                     $price = $datafirst->Wholesale_price_three;
                     DB::table('order_internal_details')
                     ->where('id', '=', $detailsfirsttwo->id)
                     ->update(['pro_price' => $price]);
                  }
 
                  if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count <= $OrderTypeFirst->order_type_number){
                     $price = $datafirst->Sector_price;
                     DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirsttwo->id)
                    ->update(['pro_price' => $price]);
                     
                  }

         $detailsfirsthree = DB::table('order_internal_details')
            ->where('prodect_id',$Count->prodect_id)
            ->where('color_id',$Count->color_id)
            ->where('size_id',$Count->size_id)
            ->where('id', '=', $Count->id)
            ->first();

            DB::table('order_internal_details')
            ->where('id', '=', $detailsfirsthree->id)
            ->update(['pro_price_total' => $detailsfirsthree->pro_price * $detailsfirsthree->pro_count]);

            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
         }
        }
    }


    public function EditOrderInternal($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'order_date' => 'required',
               
            ];  
            $messages = [
                'order_date.required' => 'حقل مطلوب',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {

              try { 
                $order = Order_internal::find($id);
                $order->order_notes = $request->input('order_notes');
                $order->save();

                // if (is_array(Input::get('stored_id_two'))) {
                //     $deatils = [];
                //     foreach (Input::get('stored_id_two') as $key => $feature) {
    
                //         $deatils[] = [
                //             'order_internal_id' => $order->id,
                //             'stored_id' => Input::get('stored_id_two')[$key],
                //             'prodect_id' => Input::get('prodect_id_two')[$key],
                //             'product_parcode' => Input::get('product_parcode_two')[$key],
                //             'color_id' => Input::get('color_id_two')[$key],
                //             'style_id' => Input::get('style_id')[$key],
                //             'size_id' => Input::get('size_id')[$key],
                //             'number_size' => Input::get('number_size_two')[$key],
                //             'pro_count' => Input::get('pro_count')[$key],
                //             'pro_price' => Input::get('pro_price')[$key],
                //             'pro_price_total' => Input::get('pro_price_total')[$key],
                //         ];
                      
                //     }
                    
                        
                //     DB::table('order_internal_details')->insert($deatils);
                // }

                DB::table('order_internals')
                ->where('id', '=', $order->id)
                ->update(['status' => 1]);
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect('admin/OrderInternal');
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back()->withInput(Input::all());
            
            }
          }
        }

        $order = Order_internal::find($id);
        $Orderdetail = Order_internal_detail::where('order_internal_id', $id)->get();
        $stores = Main_store::where('delete_from_table',0)->where('store_active',1)->get();
        $ColorSetting = Color_prosetting::where('delete_from_table',0)->where('settingcolor_active',1)->get();
        $UserSite = User::where('user_type', 2)->where('delete_from_table', 0)->where('user_active',1)->get();
        $OrderDetails = DB::table('order_internal_details')
                ->leftjoin('product_sites','order_internal_details.prodect_id', '=','product_sites.id')
                ->leftjoin('main_stores','order_internal_details.stored_id', '=','main_stores.id')
                ->leftjoin('product_stores','main_stores.id', '=','product_stores.store_id')
                ->leftjoin('color_prosettings','order_internal_details.color_id', '=','color_prosettings.id')
                ->leftjoin('product_sizes','order_internal_details.size_id', '=','product_sizes.id')
                ->leftjoin('product_site_datas','order_internal_details.color_id', '=','product_site_datas.color_id')
                ->leftjoin('product_site_sizes','order_internal_details.size_id', '=','product_site_sizes.size_value_id')
                  ->select('order_internal_details.*','product_sites.id',
                  'product_sites.product_name',
                  'product_stores.current',
                  'product_stores.store_id',
                  'product_stores.color_id',
                  'product_stores.size_id',
                  'main_stores.store_name',
                  'color_prosettings.color_name',
                  'product_sizes.size_value',
                  'product_site_sizes.size_number', 
                  'product_site_datas.Main_bar_code',
                  'product_site_datas.Main_bar_code_two',
                  'product_site_datas.Sector_price',
                  'product_site_datas.Wholesale_price',
                  'product_site_datas.Wholesale_price_two',
                  'product_site_datas.Wholesale_price_three',
                  'order_internal_details.id as details_id')
                ->where('order_internal_details.order_internal_id', $order->id)
                ->where('order_internal_details.delete_from_table',0)
                ->groupBy('order_internal_details.id')
                ->get();
        return view('backend.OrderTwo.edit',compact('stores','ColorSetting','order','Orderdetail','OrderDetails','UserSite'));
    }

    public function OpenStoreed(Request $request) {
        if ($request->ajax()) {
            // $StoreProTwo = DB::table('main_stores')
            // ->leftjoin('product_stores','main_stores.id', '=','product_stores.store_id')
            // ->leftjoin('product_sites','product_stores.product_id', '=','product_sites.id')
            // ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
            // ->select('main_stores.id','main_stores.store_name as store_name')
            // ->where('product_site_datas.Main_bar_code', 'like', '%' . $request->input('product_parcode') . '%')
            // ->orwhere('product_site_datas.Main_bar_code_two', 'like', '%' . $request->input('product_parcode') . '%')
            // ->where('main_stores.store_active',1)
            // ->where('main_stores.delete_from_table',0)
            // ->get();

            $StoreProTwo = DB::table('product_stores')
            ->join('product_sites','product_stores.product_id', '=','product_sites.id')
            ->join('main_stores','product_stores.store_id', '=','main_stores.id')
            ->join('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->join('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->join('product_site_datas','product_stores.color_id', '=','product_site_datas.color_id')
            ->join('product_site_sizes','product_stores.size_id', '=','product_site_sizes.size_value_id')
            ->select('product_sites.id',
            'product_sites.product_name',
            'product_stores.current', 
            'product_stores.store_id',
            'product_stores.color_id',
            'product_stores.size_id',
            'main_stores.store_name',
            'color_prosettings.color_name',
            'product_sizes.size_value',
            'product_site_sizes.size_number',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_three',
            'product_site_datas.Wholesale_price_two',
            'product_site_datas.Maximum_four')
            ->where('product_sites.product_active',1)
            ->where('product_sites.delete_from_table',0)
            ->where('product_site_datas.Main_bar_code', 'like', '%' . $request->input('product_parcode') . '%')
            ->orwhere('product_site_datas.Main_bar_code_two', 'like', '%' . $request->input('product_parcode') . '%')
            ->groupBy('product_stores.id')
            ->get();
            $i = 0;

            $data = view('backend.OrderAdmin.ajax-store-pro', compact('StoreProTwo','i'))->render();
            return response()->json(['options' => $data]);
        } 
    } 


    public function OpenStore(Request $request) {
        if ($request->ajax()) {

            $store_id = $request->input('stored_id');

            $Storechecked = DB::table('product_stores')
            ->select('product_stores.*')
            ->where('product_stores.store_id','=', $store_id)
            ->first();

            $StorePro = DB::table('product_stores')
            ->join('product_sites','product_stores.product_id', '=','product_sites.id')
            ->join('main_stores','product_stores.store_id', '=','main_stores.id')
            ->join('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->join('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->join('product_site_datas','product_stores.color_id', '=','product_site_datas.color_id')
            ->join('product_site_sizes','product_stores.size_id', '=','product_site_sizes.size_value_id')
            ->select('product_sites.id',
            'product_sites.product_name',
            'product_stores.current',
            'product_stores.store_id',
            'product_stores.color_id',
            'product_stores.size_id',
            'product_site_sizes.size_number',
            'main_stores.store_name',
            'color_prosettings.color_name',
            'product_sizes.size_value',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_two',
            'product_site_datas.Wholesale_price_three',
            'product_site_datas.Maximum_four')
            ->where('product_sites.product_active',1)
            ->where('product_sites.delete_from_table',0)
            ->where('main_stores.id', $request->input('stored_id'))
            ->groupBy('product_stores.id')
            ->get();
            $i = 0;
            
            $data = view('backend.OrderAdmin.ajax-store', compact('Storechecked','StorePro','i'))->render();
            return response()->json(['options' => $data]);
        } 
    } 


    public function OpenColor(Request $request) {
        if ($request->ajax()) {
            $StoreColor = DB::table('product_sites')
            ->join('product_stores','product_sites.id', '=','product_stores.product_id')
            ->join('main_stores','product_stores.store_id', '=','main_stores.id')
            ->join('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->join('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->join('product_site_datas','product_stores.color_id', '=','product_site_datas.color_id')
            ->join('product_site_sizes','product_stores.size_id', '=','product_site_sizes.size_value_id')
            ->select('product_sites.id',
            'product_sites.product_name',
            'product_stores.current',
            'product_stores.store_id',
            'product_stores.color_id',
            'product_stores.size_id',
            'main_stores.store_name',
            'color_prosettings.color_name',
            'product_sizes.size_value',
            'product_site_sizes.size_number',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_three',
            'product_site_datas.Wholesale_price_two',
            'product_site_datas.Maximum_four')
            ->where('product_sites.product_active',1)
            ->where('product_sites.delete_from_table',0)
            ->where('product_sites.product_name', 'like', '%' . $request->input('prodect_id') . '%')
            ->groupBy('product_stores.id')
            ->get();
            $i = 0;
            $data = view('backend.OrderAdmin.ajax-color', compact('StoreColor','i'))->render();
            return response()->json(['options' => $data]);
        } 
    }

    public function AddUserOrder(Request $request) { 

        $admin_id = Auth::user();
        if ($request->ajax()) {

            $order_id = $request->input('order_id');
            $user_id = $request->input('user_id');
            $dateDay = $request->input('order_date');

              if($user_id != 0){
                $order = Order_internal::find($order_id);
                $order->order_date = $dateDay;
                $order->order_admin_name = $admin_id->name;
                $order->order_user_id = $request->input('user_id');
                $order->save();
                
                DB::table('order_internals')
                ->where('id', '=', $order_id)
                ->update(['order_user_id' => $order->order_user_id ]);
            }
               

        } 
        
    }

    public function AddNewUserOrder(Request $request) { 

        $admin_id = Auth::user();
        if ($request->ajax()) {

                $order_id = $request->input('order_id');
                $user_id = $request->input('user_id');
                $dateDay = $request->input('order_date');

                $order = Order_internal::find($order_id);
                $order->order_date = $dateDay;
                $order->order_admin_name = $admin_id->name;
                $order->order_user_id = $request->input('user_id');
                $order->save();
               
                if($user_id == 0){
                $user = new User();
                $user->name = $request->input('new_client');
                $user->email = 'null';
                $user->password = 123456;
                $user->user_phone = 02;
                $user->user_type = 2;
                $user->save();

                DB::table('order_internals')
                ->where('id', '=', $order_id)
                ->update(['order_user_id' => $user->id]);

                }

        } 
        
    }


    public function OpenStyle(Request $request) { 
        
        $OrderTypeFirst = DB::table('order_types')->where('order_type_active',1)->where('id',1)->first(); //6
        $OrderTypeTwo = DB::table('order_types')->where('order_type_active',1)->where('id',2)->first(); //10
        $OrderTypeThree = DB::table('order_types')->where('order_type_active',1)->where('id',3)->first(); //20
        $OrderTypefour = DB::table('order_types')->where('order_type_active',1)->where('id',4)->first(); //100
        $admin_id = Auth::user();
        if ($request->ajax()) {

            $order_id = $request->input('order_id');
            $product_count = (int)$request->input('product_count');
            $Sector_price = $request->input('Sector_price_ax');
            $Wholesale_price = $request->input('Wholesale_price_ax');
            $Wholesale_price_two = $request->input('Wholesale_price_two_ax');
            $Wholesale_price_three = $request->input('Wholesale_price_three_ax');
            $number_size_two = $request->input('number_size_two'); 
            
            $product_id = $request->input('prodect_id');
            $product_color = $request->input('color_id');
            $totalincome = $request->input('totalincome');


                $detailsfirst = DB::table('order_internal_details')
                ->join('order_internals','order_internal_details.order_internal_id', '=','order_internals.id')
                ->select('order_internal_details.id','order_internal_details.pro_count')
                ->where('order_internal_details.prodect_id',$request->input('prodect_id_two'))
                ->where('order_internal_details.color_id',$request->input('color_id_two'))
                ->where('order_internal_details.size_id',$request->input('size_id_two'))
                ->where('order_internal_details.order_internal_id',$order_id)
                ->orderBy('id', 'desc')
                ->first();

                $datafirst =  DB::table('product_site_datas')
                ->where('product_id', '=', $request->input('prodect_id_two'))
                ->where('product_sizes_id', '=', $request->input('size_id_two'))
                ->where('color_id', '=', $request->input('color_id_two'))
                ->first(); 

                $tested =  DB::table('product_stores')
                ->where('product_id', '=', $request->input('prodect_id'))
                ->where('color_id', '=', $request->input('color_id'))
                ->where('size_id', '=', $request->input('size_id_two'))
                ->orderBy('id','desc')
                ->first();
                
             if($product_count <= $tested->current){   

             if(!empty($detailsfirst) || isset($detailsfirst)){

                $resulte = $detailsfirst->pro_count + $request->input('product_count');

               if($resulte > $datafirst->Maximum_four){
                Session::flash('error', 'يجب ان يكون العدد المطلوب اقل من الحد الأقصى للطلب');
                return Redirect::back();
    
               }else{
                   

               if($product_count <= $tested->Drawn && $product_count <= $tested->current){
                     
                    $Count = Order_internal_detail::find($detailsfirst->id);
                    
                    DB::table('order_internal_details')
                    ->where('id', '=', $detailsfirst->id)
                    ->update(['pro_count' => $Count->pro_count + $request->input('product_count')]);

                    $Count->save();

                    $update =  DB::table('product_stores')
                    ->where('product_id', '=', $Count->prodect_id)
                    ->where('color_id', '=', $Count->color_id)
                    ->where('size_id', '=', $Count->size_id)
                    ->first(); 

                    DB::table('product_stores')
                    ->where('product_id', '=', $Count->prodect_id)
                    ->where('color_id', '=', $Count->color_id)
                    ->where('size_id', '=', $Count->size_id)
                    ->update(['Drawn' =>$update->Drawn + $request->input('product_count')]);
             

                    $updatetwo =  DB::table('product_stores')
                    ->where('product_id', '=', $Count->prodect_id)
                    ->where('color_id', '=', $Count->color_id)
                    ->where('size_id', '=', $Count->size_id)
                    ->first(); 

                 
                    DB::table('product_stores')
                    ->where('product_id', '=', $Count->prodect_id)
                    ->where('color_id', '=', $Count->color_id)
                    ->where('size_id', '=', $Count->size_id)
                    ->update(['current' =>$updatetwo->size_number - $updatetwo->Drawn]);
                
                  


                    $updatethree =  DB::table('product_stores')
                    ->where('product_id', '=', $Count->prodect_id)
                    ->where('color_id', '=', $Count->color_id)
                    ->where('size_id', '=', $Count->size_id)
                    ->first(); 
    
                    DB::table('product_site_sizes')
                    ->where('product_id', '=', $updatethree->product_id)
                    ->where('size_value_id', '=', $updatethree->size_id)
                    ->where('product_color_id', '=', $updatethree->color_id)
                    ->update(['size_number' => $updatethree->current]);
                    
                    DB::table('order_internal_details')
                    ->where('order_internal_id', '=', $order_id)
                    ->where('prodect_id', '=', $updatethree->product_id)
                    ->where('size_id', '=', $updatethree->size_id)
                    ->where('color_id', '=', $updatethree->color_id)
                    ->update(['number_size' => $updatethree->current]);
                

                    $detailsfirsttwo = DB::table('order_internal_details')
                    ->where('prodect_id',$Count->prodect_id)
                    ->where('color_id',$Count->color_id)
                    ->where('size_id',$Count->size_id)
                    ->where('id', '=', $Count->id)
                    ->first();

                    if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeFirst->order_type_number){
                        $price = $Wholesale_price;
                        DB::table('order_internal_details')
                        ->where('id', '=', $detailsfirsttwo->id)
                        ->update(['pro_price' => $price]);
                     }
     
                     if(!empty($OrderTypeTwo->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeTwo->order_type_number){
                         $price = $Wholesale_price_two;
                         DB::table('order_internal_details')
                        ->where('id', '=', $detailsfirsttwo->id)
                        ->update(['pro_price' => $price]);
                      }
     
                      if(!empty($OrderTypeThree->order_type_number) && $detailsfirsttwo->pro_count > $OrderTypeThree->order_type_number){
                         $price = $Wholesale_price_three;
                         DB::table('order_internal_details')
                         ->where('id', '=', $detailsfirsttwo->id)
                         ->update(['pro_price' => $price]);
                      }
     
                      if(!empty($OrderTypeFirst->order_type_number) && $detailsfirsttwo->pro_count <= $OrderTypeFirst->order_type_number){
                         $price = $Sector_price;
                         DB::table('order_internal_details')
                        ->where('id', '=', $detailsfirsttwo->id)
                        ->update(['pro_price' => $price]);
                         
                      }


                    $detailstheerdd = DB::table('order_internal_details')
                    ->where('prodect_id',$Count->prodect_id)
                    ->where('color_id',$Count->color_id)
                    ->where('size_id',$Count->size_id)
                    ->where('id', '=', $Count->id)
                    ->first();   

                    DB::table('order_internal_details')
                    ->where('id', '=', $detailstheerdd->id)
                    ->update(['pro_price_total' => $detailstheerdd->pro_price * $detailstheerdd->pro_count]);
                    
                 $editicon = 1;
                }
               }

              $editicon = 1; 
                       
                
             }else{

                $test =  DB::table('product_stores')
               ->where('product_id', '=', $request->input('prodect_id_two'))
               ->where('color_id', '=', $request->input('color_id_two'))
               ->where('size_id', '=', $request->input('size_id_two'))
               ->orderBy('id','desc')
               ->first();
               
               $validation_test = false;
               
               if($product_count <= $test->current && $validation_test == false){


                $data = $request->all();

                $rules = [
                    'product_count' => 'required',
                
                ];  
                $Validator = Validator::make($data, $rules);
                if ($Validator->fails()) {
                    return redirect()->back()->withErrors($Validator)->withInput(Input::all());
                } else {
                    

                    $update =  DB::table('product_stores')
                    ->where('product_id', '=', $request->input('prodect_id'))
                    ->where('color_id', '=', $request->input('color_id'))
                    ->where('size_id', '=', $request->input('size_id_two'))
                    ->first(); 
                    
                    DB::table('product_stores')
                    ->where('product_id', '=', $request->input('prodect_id'))
                    ->where('color_id', '=', $request->input('color_id'))
                    ->where('size_id', '=', $request->input('size_id_two'))
                    ->update(['current' =>$update->current - $product_count]);


        
                    $updatetwo =  DB::table('product_stores')
                    ->where('product_id', '=', $request->input('prodect_id'))
                    ->where('color_id', '=', $request->input('color_id'))
                    ->where('size_id', '=', $request->input('size_id_two'))
                    ->first();
                    
                    
                    
                    
                     DB::table('product_stores')
                    ->where('product_id', '=', $request->input('prodect_id'))
                    ->where('color_id', '=', $request->input('color_id'))
                    ->where('size_id', '=', $request->input('size_id_two'))
                    ->update(['Drawn' =>$updatetwo->Drawn + $product_count]);
                    
                    
        
                    $updatethree =  DB::table('product_stores')
                    ->where('product_id', '=', $request->input('prodect_id'))
                    ->where('color_id', '=', $request->input('color_id'))
                    ->where('size_id', '=', $request->input('size_id_two'))
                    ->first(); 
        
                    DB::table('product_site_sizes')
                    ->where('product_id', '=', $updatethree->product_id)
                    ->where('size_value_id', '=', $updatethree->size_id)
                    ->where('product_color_id', '=', $updatethree->color_id)
                    ->update(['size_number' => $updatethree->current]);
               
                   if($updatethree->current <= $update->current && $product_count <= $updatethree->size_number){
                    $orderdetail = new ProcessOrderThumbnails();
                    $orderdetail->order_internal_id = $order_id;
                    $orderdetail->stored_id = $request->input('stored_id_two');
                    $orderdetail->prodect_id = $request->input('prodect_id_two');
                    $orderdetail->product_parcode = $request->input('product_parcode_two');
                    $orderdetail->color_id = $request->input('color_id_two');
                    $orderdetail->style_id = $request->input('style_id');
                    $orderdetail->size_id = $request->input('size_id_two');
                    $orderdetail->number_size = $request->input('number_size_two');
                    $orderdetail->pro_count = $request->input('product_count');
                    
                    if(!empty($OrderTypeFirst->order_type_number) && $product_count > $OrderTypeFirst->order_type_number){
                       $price = $Wholesale_price;
                       $orderdetail->pro_price = $price;
                       $orderdetail->pro_price_total = $product_count * $price;
                    }
    
                    if(!empty($OrderTypeTwo->order_type_number) && $product_count > $OrderTypeTwo->order_type_number){
                        $price = $Wholesale_price_two;
                        $orderdetail->pro_price = $price;
                        $orderdetail->pro_price_total = $product_count * $price;
                     }
    
                     if(!empty($OrderTypeThree->order_type_number) && $product_count > $OrderTypeThree->order_type_number){
                        $price = $Wholesale_price_three;
                        $orderdetail->pro_price = $price;
                        $orderdetail->pro_price_total = $product_count * $price;
                     }
    
                     if(!empty($OrderTypeFirst->order_type_number) && $product_count <= $OrderTypeFirst->order_type_number){
                        $price = $Sector_price;
                        $orderdetail->pro_price = $Sector_price;
                        $orderdetail->pro_price_total = $product_count * $Sector_price;
                     }
    
                     $orderdetail->save();
                     
                     dispatch($orderdetail)->delay(Carbon::now()->addSeconds(3));

        
                  $updatethreee =  DB::table('product_stores')
                        ->where('product_id', '=', $request->input('prodect_id'))
                        ->where('color_id', '=', $request->input('color_id'))
                        ->where('size_id', '=', $request->input('size_id_two'))
                        ->first(); 
                        
                        DB::table('order_internal_details')
                        ->where('order_internal_id', '=', $order_id)
                        ->where('prodect_id', '=', $updatethreee->product_id)
                        ->where('size_id', '=', $updatethreee->size_id)
                        ->where('color_id', '=', $updatethreee->color_id)
                        ->update(['number_size' => $updatethreee->current]);
                   }
    
                 }
                     $editicon = 2; 
                }
                 
                }
                
            }    
            
             $editicon = 2; 
            if($product_count <= $tested->current){


            $StoreStyle = DB::table('order_internal_details')
                ->join('order_internals','order_internal_details.order_internal_id', '=','order_internals.id')
                ->join('product_sites','order_internal_details.prodect_id', '=','product_sites.id')
                ->join('color_prosettings','order_internal_details.color_id', '=','color_prosettings.id')
                ->join('product_sizes','order_internal_details.size_id', '=','product_sizes.id')
                ->join('product_site_datas','order_internal_details.color_id', '=','product_site_datas.color_id')
                ->join('product_site_sizes','order_internal_details.size_id', '=','product_site_sizes.size_value_id')
                ->select('order_internal_details.*','product_sites.id as pro_id','product_sites.product_name',
                    'color_prosettings.color_name',
                    'product_sizes.size_value',
                    'product_site_sizes.size_number',
                    'product_site_datas.Main_bar_code',
                    'product_site_datas.Main_bar_code_two',
                    'product_site_datas.Sector_price', 
                    'product_site_datas.Wholesale_price',
                    'product_site_datas.Wholesale_price_three',
                    'product_site_datas.Wholesale_price_two',
                    'product_site_datas.Maximum_four','order_internal_details.id as details_id')
                ->where('order_internal_details.delete_from_table',0)
                ->where('order_internal_details.order_internal_id',$order_id)
                ->groupBy('order_internal_details.id')
                ->get();
            
            $OrderTypeFirst = DB::table('order_types')->where('order_type_active',1)->where('id',1)->first(); //6
            $OrderTypeTwo = DB::table('order_types')->where('order_type_active',1)->where('id',2)->first(); //10
            $OrderTypeThree = DB::table('order_types')->where('order_type_active',1)->where('id',3)->first(); //20
            $OrderTypefour = DB::table('order_types')->where('order_type_active',1)->where('id',4)->first(); //100
           } else {
            $StoreStyle = null;
            
            $OrderTypeFirst = DB::table('order_types')->where('order_type_active',1)->where('id',1)->first(); //6
            $OrderTypeTwo = DB::table('order_types')->where('order_type_active',1)->where('id',2)->first(); //10
            $OrderTypeThree = DB::table('order_types')->where('order_type_active',1)->where('id',3)->first(); //20
            $OrderTypefour = DB::table('order_types')->where('order_type_active',1)->where('id',4)->first(); //100
           }
            $i = 0; 
            
        
            $data = view('backend.OrderAdmin.ajax-style', compact('editicon','OrderTypeFirst','OrderTypeTwo','OrderTypeThree','OrderTypefour','totalincome','StoreStyle','i','product_count'))->render();
            return response()->json(['options' => $data]);
        } 
        
    }
   
    public function OpenDeleted(Request $request){
        if ($request->ajax()) {
            $product_id = $request->input('prodect_id');
            $product_count = $request->input('product_count');
            $product_color = $request->input('color_id');

            $update =  DB::table('product_stores')
            ->where('product_id', '=', $request->input('prodect_id'))
            ->where('color_id', '=', $product_color)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $request->input('prodect_id'))
            ->where('color_id', '=', $product_color)
            ->update(['Drawn' => $update->Drawn - $product_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $request->input('prodect_id'))
            ->where('color_id', '=', $product_color)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $request->input('prodect_id'))
            ->where('color_id', '=', $product_color)
            ->update(['current' => $product_count + $updatetwo->current ]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $request->input('prodect_id'))
            ->where('color_id', '=', $product_color)
            ->first(); 

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->update(['size_number' => $updatethree->current]);

            return response()->json('success');
        } 
    }

    public function Openchecked(Request $request) {
        if ($request->ajax()) {
            $size_id = $request->input('size_id');
            $product_id = $request->input('product_id');
            $product_color = $request->input('color_id');
            $store_id = $request->input('store_id');

            $Storechecked = DB::table('product_stores')
            ->select('product_stores.*')
            ->where('product_stores.size_id','=', $size_id)
            ->where('product_stores.product_id','=', $product_id)
            ->where('product_stores.color_id','=', $product_color)
            ->where('product_stores.store_id','=', $store_id)
            ->first();

            $data = view('backend.OrderAdmin.ajax-Checked', compact('Storechecked'))->render();
            return response()->json(['options' => $data]);
        } 
        
    }

    public function OpenSize(Request $request) {
        if ($request->ajax()) {
            $StoreSize = DB::table('product_sites')
            ->join('product_stores','product_sites.id', '=','product_stores.product_id')
            ->join('main_stores','product_stores.store_id', '=','main_stores.id')
            ->join('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->join('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->join('product_site_datas','product_stores.color_id', '=','product_site_datas.color_id')
            ->join('product_site_sizes','product_stores.size_id', '=','product_site_sizes.size_value_id')
            ->join('product_colors','product_stores.color_id', '=','product_colors.colors')
            ->select('product_sites.id',
            'product_sites.product_name',
            'product_stores.current',
            'product_stores.store_id',
            'product_stores.color_id',
            'product_stores.size_id',
            'main_stores.store_name',
            'color_prosettings.color_name',
            'product_sizes.size_value',
            'product_site_sizes.size_number',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_two',
            'product_site_datas.Wholesale_price_three',
            'product_site_datas.Maximum_four')
            ->where('product_sites.product_active',1)
            ->where('product_sites.delete_from_table',0)
            ->where('product_colors.colors', $request->input('color_id'))
            ->groupBy('product_stores.id')
            ->get();
            $i = 0;
            $data = view('backend.OrderAdmin.ajax-size', compact('StoreSize','i'))->render();
            return response()->json(['options' => $data]);
        } 
        
    }


    public function OpenNumber(Request $request) {
        if ($request->ajax()) {
            $StoreNumber = DB::table('product_site_sizes')->where('id', $request->size_id)->first();
            $data = view('backend.OrderAdmin.ajax-number', compact('StoreNumber'))->render();
            return response()->json(['options' => $data]);
        }
    }
    public function OpenNumberTwo(Request $request) {
        if ($request->ajax()) {
            $StoreNumber = DB::table('product_site_sizes')
            ->leftjoin('product_site_datas','product_site_sizes.product_id', '=','product_site_datas.product_id')
            ->where('product_site_datas.Main_bar_code', 'like', '%' . $request->input('product_parcode') . '%')
            ->orwhere('product_site_datas.Main_bar_code_two', 'like', '%' . $request->input('product_parcode') . '%')
            ->first();
            $data = view('backend.OrderAdmin.ajax-number', compact('StoreNumber'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function OpenCode(Request $request) {
        if ($request->ajax()) {
            $StoreCode = DB::table('product_site_datas')
            ->select('product_site_datas.Main_bar_code as Main_bar_code')
            ->where('product_site_datas.product_id',$request->prodect_id)
            ->first();
            $data = view('backend.OrderAdmin.ajax-code', compact('StoreCode'))->render();
            return response()->json(['options' => $data]);
        }
    }
    public function OpenPrice(Request $request) {
        if ($request->ajax()) { 
      
        $OrderTypeFirst = DB::table('order_types')->where('order_type_active',1)->where('id',1)->first();
        $OrderTypeTwo = DB::table('order_types')->where('order_type_active',1)->where('id',2)->first();
        $OrderTypeThree = DB::table('order_types')->where('order_type_active',1)->where('id',3)->first();
        $OrderTypefour = DB::table('order_types')->where('order_type_active',1)->where('id',4)->first();

         if(!empty($request->pro_count)){
            $Count_Order = ($request->pro_count);
         } else {
            $Count_Order = 0 ; 
         }
         
        $DetalisPro = DB::table('product_site_datas')->where('product_sizes_id',$request->size_id)->where('product_id',$request->prodect_id)->first(); 

                if(!empty($DetalisPro)){
                    if($Count_Order <= $OrderTypeFirst->order_type_number){
                        $price = ($DetalisPro->Sector_price);
                       } elseif( $Count_Order >= $OrderTypeTwo->order_type_number && $Count_Order <= $OrderTypeThree->order_type_number) {
                        $price = ($DetalisPro->Wholesale_price);
                       } elseif($Count_Order >= $OrderTypeThree->order_type_number && $Count_Order <= $OrderTypefour->order_type_number){
                        $price = ($DetalisPro->Wholesale_price_two);
                       } elseif($Count_Order >= $OrderTypefour->order_type_number){
                        $price = ($DetalisPro->Wholesale_price_three);
                       } else {
                        $price = 0;
                    } 
                   
                } else {
                    $price = 0;
                }
            $data = view('backend.OrderAdmin.ajax-price', compact('price'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function DeleteOrderInternal($id) {
        try {
            
            $removeTest =DB::table('order_internal_details')
                    ->where('order_internal_id', '=', $id)
                    ->first();
          if(!empty($removeTest)){
            $update =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['Drawn' => $update->Drawn - $removeTest->pro_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['current' => $removeTest->pro_count + $updatetwo->current]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->update(['size_number' => $updatethree->current]);  
            
            
            DB::table('order_internal_details')
            ->where('order_internal_id', '=', $id)
            ->delete();

            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->delete();
          }else{
            DB::table('order_internal_details')
            ->where('order_internal_id', '=', $id)
            ->delete();

            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->delete(); 
          }
            

            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function DeleteOrderButton($id) {
        try {
            
            $removeTest =DB::table('order_internal_details')
                    ->where('order_internal_id', '=', $id)
                    ->first();
          if(!empty($removeTest)){
            $update =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['Drawn' => $update->Drawn - $removeTest->pro_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['current' => $removeTest->pro_count + $updatetwo->current]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->where('product_color_id', '=', $updatethree->color_id)
            ->update(['size_number' => $updatethree->current]);  
            
            
            DB::table('order_internal_details')
            ->where('order_internal_id', '=', $id)
            ->delete();

            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->delete();
          }else{
            DB::table('order_internal_details')
            ->where('order_internal_id', '=', $id)
            ->delete();

            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->delete(); 
          }
            

            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect('admin/OrderInternal');
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function DeleteOrderDetails($id) {
        
        try {
            $removeTest =DB::table('order_internal_details')
                    ->where('id', '=', $id)
                    ->first();
          
            $update =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['Drawn' => $update->Drawn - $removeTest->pro_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['current' => $removeTest->pro_count + $updatetwo->current]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            // dd($updatethree );

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->where('product_color_id', '=', $updatethree->color_id)
            ->update(['size_number' => $updatethree->current]);  
            
            
            DB::table('order_internal_details')
            ->where('id', '=', $id)
            ->delete();
            
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
        
    }
    
    public function ActiveOrderInternal($id) {
        try {
            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->update(['order_active' => 1]);       
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveOrderInternal($id) {
        try {
            DB::table('order_internals')
                    ->where('id', '=', $id)
                    ->update(['order_active' => 2]);
             
            $removeTest =DB::table('order_internal_details')
            ->where('id', '=', $id)
            ->first();

            $update =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['Drawn' => $update->Drawn - $removeTest->pro_count]);

            $updatetwo =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->update(['current' => $removeTest->pro_count + $updatetwo->current]);

            $updatethree =  DB::table('product_stores')
            ->where('product_id', '=', $removeTest->prodect_id)
            ->where('color_id', '=', $removeTest->color_id)
            ->where('size_id', '=', $removeTest->size_id)
            ->first(); 

            DB::table('product_site_sizes')
            ->where('product_id', '=', $updatethree->product_id)
            ->where('size_value_id', '=', $updatethree->size_id)
            ->update(['size_number' => $updatethree->current]);  

            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }

    public function ShowInvoiceAdmin($id) {

        $orderfirst = DB::table('order_internals')
                ->leftjoin('users', 'order_internals.order_user_id', '=', 'users.id')
                ->leftjoin('countries', 'users.country_id', '=', 'countries.id')
                ->leftjoin('cities', 'users.city_id', '=', 'cities.id')
                ->leftjoin('areas', 'users.area_id', '=', 'areas.id')
                ->select('order_internals.*','users.user_type as user_type',
                'users.email as use_email','users.user_address as user_address',
                'users.name as use_name','users.user_phone as user_phone',
                'users.user_secondname as user_secondname',
                'countries.country_name as country_name',
                 'cities.city_name as city_name', 'areas.area_name as area_name',
                 DB::raw('(select SUM(pro_price_total) from  order_internal_details where order_internal_id = order_internals.id) as total_price'))
                ->where('order_internals.id', $id)
                ->first();

        $i = 1; 
    
        $orderdetails = DB::table('order_internal_details')
        ->leftjoin('product_sites','order_internal_details.prodect_id', '=','product_sites.id')
        ->leftjoin('main_stores','order_internal_details.stored_id', '=','main_stores.id')
        ->leftjoin('product_stores','main_stores.id', '=','product_stores.store_id')
        ->leftjoin('color_prosettings','order_internal_details.color_id', '=','color_prosettings.id')
        ->leftjoin('product_sizes','order_internal_details.size_id', '=','product_sizes.id')
        ->leftjoin('product_site_datas','order_internal_details.color_id', '=','product_site_datas.color_id')
        ->leftjoin('product_site_sizes','order_internal_details.size_id', '=','product_site_sizes.size_value_id')
                  ->select('order_internal_details.*','product_sites.id',
                  'product_sites.product_name',
                  'product_sites.product_main_image',
                  'product_stores.current',
                  'product_stores.store_id',
                  'product_stores.color_id',
                  'product_stores.size_id',
                  'main_stores.store_name',
                  'color_prosettings.color_name',
                  'product_sizes.size_value',
                  'product_site_sizes.size_number',
                  'product_site_datas.Main_bar_code',
                  'product_site_datas.Main_bar_code_two',
                  'product_site_datas.Sector_price',
                  'product_site_datas.Wholesale_price',
                  'product_site_datas.Wholesale_price_two',
                  'product_site_datas.Wholesale_price_three')
        ->where('order_internal_details.order_internal_id', $id)
        ->groupBy('order_internal_details.id')
        ->get();

        $Costs = Order_cost::where('delete_from_table',0)->where('cost_active',1)->get();

        $Costsdetails = DB::table('invoice_costs')
        ->join('order_costs','invoice_costs.cost_id', '=','order_costs.id')
        ->select('invoice_costs.*','order_costs.cost_name')
        ->where('invoice_costs.order_id',$id)
        ->get();

        $CostsSum = DB::table('invoice_costs')
        ->join('order_costs','invoice_costs.cost_id', '=','order_costs.id')
        ->select('invoice_costs.*','order_costs.cost_name')
        ->where('invoice_costs.order_id',$id)
        ->sum('cost_price');
        return view('backend.OrderAdmin.invoice', compact('orderdetails','i', 'orderfirst','Costs','Costsdetails','CostsSum'));
    }

    public function OrderCost($id,Request $request){
        if ($request->isMethod('post')) {
            try {
        if (is_array(Input::get('cost_id'))) {
            $deatils = [];
            foreach (Input::get('cost_id') as $key => $feature) {

                $deatils[] = [
                    'order_id' => $id,
                    'cost_id' => Input::get('cost_id')[$key],
                    'cost_price' => Input::get('cost_price')[$key],
                ];
              
            }
            
            DB::table('invoice_costs')->insert($deatils);
        }
            Session::flash('success', 'تم الحفظ بنجاح');    
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحفظ');
            return Redirect::back()->withInput(Input::all());
        } 
       }
    }

    public function DeleteCostFrom($id) {
        try {
            DB::table('invoice_costs')
                    ->where('id', '=', $id)
                    ->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
} 
