<?php

namespace App\Http\Controllers\Admin\ProductSite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Color_prosetting;
use App\Product_style;
use App\Product_size;
use App\Product_site;
use App\Product_site_size;
use App\Product_color;
use App\productdata;
use App\Product_site_data;
use App\Product_site_image;
use App\Order_type; 
use App\Main_store; 
use App\Product_store;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ProductController extends Controller
{
   public function IndexProduct(){
    $i = 1;
    $productsite = DB::table('product_sites')
            ->leftjoin('categories','product_sites.category_id', '=','categories.id')
            ->leftjoin('product_colors','product_sites.id', '=','product_colors.product_id')
            ->leftjoin('color_prosettings','product_colors.colors', '=','color_prosettings.id')
            ->leftjoin('product_site_sizes','product_sites.id', '=','product_site_sizes.product_id')
            ->leftjoin('product_sizes','product_site_sizes.size_value_id', '=','product_sizes.id')
            ->select('product_sites.*', 'categories.cat_name as cat_name','product_sizes.size_value as size_value','color_prosettings.color_name as color_name')
            ->where('product_sites.delete_from_table', 0)
            ->orderBy('product_sites.id','desc')
            ->groupBy('product_colors.id')
            ->get();
    $productcount = Product_site::where('delete_from_table', 0)->count();
    $productcountactive = Product_site::where('delete_from_table', 0)->where('product_active',1)->count();
    $productcountUnactive = Product_site::where('delete_from_table', 0)->where('product_active',2)->count();
       return view('backend.Product.index',compact('productcountUnactive','productcountactive','productcount','productsite','i'));
   }
 
   public function AddProduct(Request $request){
    if ($request->isMethod('post')) {
        $data = $request->all();
        // dd($data);
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_Purch_price' => 'required',
            'product_desc' => 'required',
            'product_main_image' => 'required',
            'price_type_value' => 'required',

           
        ];  
        $messages = [
            'category_id.required' => 'مطلوب أختيار القسم',
            'product_name.required' => 'مطلوب أدخال أسم المنتج',
            'product_Purch_price.required' => 'مطلوب أدخال سعر الشراء',
            'product_desc.required' => 'مطلوب أدخال نبذه عن المنتج',
            'product_main_image.required' => 'مطلوب رفع صورة المنتج',
            'price_type_value.required' => 'حقل مطلوب',
         
        ];
        $Validator = Validator::make($data, $rules, $messages);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput(Input::all());
        } else {

            
            if (!empty($request->input('product_Purch_price')) && is_array(Input::get('Wholesale_price_three'))) {
                if((Input::get('product_Purch_price')) > (Input::get('Wholesale_price_three'))) {
                    Session::flash('error', 'لا يمكن ان يكون سعر جمله الجمله أقل من سعر الشراء');
                    return Redirect::back()->withInput(Input::all());

            } elseif((Input::get('Wholesale_price')) < (Input::get('Wholesale_price_three'))) {
                Session::flash('error', 'لا يمكن ان يكون سعر الجمله أقل من سعر جمله الجمله');
                return Redirect::back()->withInput(Input::all());

            } elseif((Input::get('Wholesale_price_two')) < (Input::get('Wholesale_price'))) {
                Session::flash('error', 'لا يمكن ان يكون سعر نص الجمله أقل من سعر الجمله');
                return Redirect::back()->withInput(Input::all());

            } elseif((Input::get('Sector_price')) < (Input::get('Wholesale_price_two'))) {
                Session::flash('error', 'لا يمكن ان يكون سعر القطاعى أقل من سعر نص الجمله');
                return Redirect::back()->withInput(Input::all());
           
            }

           try {
            $product = new Product_site();
            $product->category_id = $request->input('category_id');
            $product->product_name = $request->input('product_name');
            $product->product_slog = Str::slug($request->product_name, '-');
            $product->product_Purch_price = $request->input('product_Purch_price');
            $product->product_desc = $request->input('product_desc');
            $product->price_type_value = $request->input('price_type_value');
            
            if (Input::hasFile('product_main_image')) {
                $file = Input::file('product_main_image');
                $path = 'product/image/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $product->product_main_image = $path . $filename;
            }
            $product->save();
            
            //add-to-table-product_colors
            if (is_array(Input::get('colors'))) {
                $deatils = [];
                foreach (Input::get('colors') as $key => $feature) {

                    $deatils[] = [
                        'product_id' => $product->id,
                        'style_id' => Input::get('style_id')[$key],
                        'colors' => Input::get('colors')[$key],
                    ];
                }
                DB::table('product_colors')->insert($deatils);
            }


            //add-to-table-product_site_size
            if (is_array(Input::get('colors'))) {
                $product_site_size = [];
                foreach (Input::get('colors') as $keyw => $feature) {

                     $product_site_size[] = [
                        'product_id' => $product->id,
                        'product_color_id' => Input::get('colors')[$keyw],
                        'size_value_id' => Input::get('size_value_id')[$keyw],
                        'size_value_open' => Input::get('size_value_open')[$keyw],
                        'size_number' => Input::get('size_number')[$keyw],
                    ];
                }
                DB::table('product_site_sizes')->insert($product_site_size);
            }  
             
            
           //add-to-table-product_site_images
            if (is_array(Input::file('images'))) {
                $images = [];
                foreach (Input::file('images') as $keyv => $feature) {
                    if (Input::hasFile('images')) {
                        $file = Input::file('images')[$keyv];
                        $path = 'uploads/product/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $imagedeatils = $path . $filename;
                    }
                    $images[] = [
                        'product_id' => $product->id,
                        'product_sizes_id' => Input::get('size_value_id')[$keyv],
                        'images' => $imagedeatils,
                    ];
                }
                DB::table('product_site_images')->insert($images);
            }
         
            if (is_array(Input::get('colors'))) {
                $product_site_datas = [];
                foreach (Input::get('colors') as $keys => $feature) {

                     $product_site_datas[] = [
                        'product_id' => $product->id,
                        'color_id' => Input::get('colors')[$keys],
                        'product_sizes_id' => Input::get('size_value_id')[$keys],
                        'Wholesale_price_three' => Input::get('Wholesale_price_three')[$keys],
                        'Wholesale_price' => Input::get('Wholesale_price')[$keys],
                        'Wholesale_price_two' => Input::get('Wholesale_price_two')[$keys],
                        'Sector_price' => Input::get('Sector_price')[$keys],
                        'Maximum_four' => Input::get('Maximum_four')[$keys],
                        'Main_bar_code' => Input::get('Main_bar_code')[$keys],
                        'Main_bar_code_two' => Input::get('Main_bar_code_two')[$keys],
                        'store_id' => Input::get('store_id')[$keys],
                    ];
                }
                DB::table('product_site_datas')->insert($product_site_datas);
            }
          

            if (is_array(Input::get('colors'))) {
                $deatils = [];
                foreach (Input::get('colors') as $keyx => $feature) {

                    $deatils[] = [
                        'product_id' => $product->id,
                        'color_id' => Input::get('colors')[$keyx],
                        'store_id' => Input::get('store_id')[$keyx],
                        'style_id' => Input::get('style_id')[$keyx],
                        'size_id' => Input::get('size_value_id')[$keyx],
                        'size_number' => Input::get('size_number')[$keyx],
                        'current' => Input::get('size_number')[$keyx],
                    ];
                }
                DB::table('product_stores')->insert($deatils);
            } 
        
            
            Session::flash('success', 'تم الحفظ بنجاح');
            return Redirect('admin/SiteProduct');
            } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحفظ');
            // DB::table('product_sites')
            //     ->where('id', '=', $product->id)
            //     ->update(['delete_from_table' => 1]);
            DB::table('product_stores')
                ->where('product_id', '=', $product->id)
                ->delete();
            DB::table('product_site_sizes')
               ->where('product_id', '=', $product->id)
               ->delete();  
            DB::table('product_colors')
               ->where('product_id', '=', $product->id)
               ->delete();
            DB::table('product_site_images')
               ->where('product_id', '=', $product->id)
               ->delete();
               DB::table('product_sites')
               ->where('id', '=', $product->id)
               ->delete();     
            return Redirect::back()->withInput(Input::all());
        
          }
      } 
    }
  }
 
    $Category = Category::where('delete_from_table',0)->where('cat_active',1)->get();
    $Style = Product_style::where('delete_from_table',0)->where('settingstyle_active',1)->get();
    $SizeCode = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',1)->get();
    $SizeNubmer = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',2)->get();
    $ColorSetting = Color_prosetting::where('delete_from_table',0)->where('settingcolor_active',1)->get();
    $OrderType = Order_type::where('delete_from_table',0)->where('order_type_active',1)->where('id',3)->first();
    $store = Main_store::where('delete_from_table',0)->where('store_active',1)->get();
    return view('backend.Product.addnew',compact('store','ColorSetting','Category','Style','SizeCode','SizeNubmer','OrderType'));
}

public function EditProduct($id,Request $request){
  
    if ($request->isMethod('post')) {
        $data = $request->all();
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_Purch_price' => 'required',
            'product_desc' => 'required',
          
        ]; 
        $messages = [
            'category_id.required' => 'مطلوب أختيار القسم',
            'product_name.required' => 'مطلوب أدخال أسم المنتج',
            'product_Purch_price.required' => 'مطلوب أدخال سعر الشراء',
            'product_desc.required' => 'مطلوب أدخال نبذه عن المنتج',
        ];
        $Validator = Validator::make($data, $rules, $messages);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput(Input::all());
        } else {
            try {
            $product = Product_site::find($id);
            $product->category_id = $request->input('category_id');
            $product->product_name = $request->input('product_name');
            $product->product_slog = Str::slug($request->product_name, '-');
            $product->product_Purch_price = $request->input('product_Purch_price');
            $product->product_desc = $request->input('product_desc');
            
            if (Input::hasFile('product_main_image')) {
                $file = Input::file('product_main_image');
                $path = 'product/image/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $product->product_main_image = $path . $filename;
            }
            $product->save();

        //add-to-table-product_colors
            if (is_array(Input::get('colors'))) {
                $deatils = [];
                foreach (Input::get('colors') as $key => $feature) {

                    $deatils[] = [
                        'product_id' => $product->id,
                        'style_id' => Input::get('style_id')[$key],
                        'colors' => Input::get('colors')[$key],
                    ];
                }
                DB::table('product_colors')->insert($deatils);
            }


            //add-to-table-product_site_size
            if (is_array(Input::get('colors'))) {
                $product_site_size = [];
                foreach (Input::get('colors') as $keyw => $feature) {

                     $product_site_size[] = [
                        'product_id' => $product->id,
                        'product_color_id' => Input::get('colors')[$keyw],
                        'size_value_id' => Input::get('size_value_id')[$keyw],
                        'size_value_open' => Input::get('size_value_open')[$keyw],
                        'size_number' => Input::get('size_number')[$keyw],
                    ];
                }
                DB::table('product_site_sizes')->insert($product_site_size);
            }  
            
            
           //add-to-table-product_site_images
            if (is_array(Input::file('images'))) {
                $images = [];
                foreach (Input::file('images') as $keyv => $feature) {
                    if (Input::hasFile('images')) {
                        $file = Input::file('images')[$keyv];
                        $path = 'uploads/product/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $imagedeatils = $path . $filename;
                    }
                    $images[] = [
                        'product_id' => $product->id,
                        'product_sizes_id' => Input::get('size_value_id')[$keyv],
                        'images' => $imagedeatils,
                    ];
                }
                DB::table('product_site_images')->insert($images);
            }
         


            if (is_array(Input::get('colors'))) {
                $product_site_datas = [];
                foreach (Input::get('colors') as $keys => $feature) {

                     $product_site_datas[] = [
                        'product_id' => $product->id,
                        'color_id' => Input::get('colors')[$keys],
                        'product_sizes_id' => Input::get('size_value_id')[$keys],
                        'Wholesale_price_three' => Input::get('Wholesale_price_three')[$keys],
                        'Wholesale_price' => Input::get('Wholesale_price')[$keys],
                        'Wholesale_price_two' => Input::get('Wholesale_price_two')[$keys],
                        'Sector_price' => Input::get('Sector_price')[$keys],
                        'Maximum_four' => Input::get('Maximum_four')[$keys],
                        'Main_bar_code' => Input::get('Main_bar_code')[$keys],
                        'Main_bar_code_two' => Input::get('Main_bar_code_two')[$keys],
                        'store_id' => Input::get('store_id')[$keys],
                    ];
                }
                DB::table('product_site_datas')->insert($product_site_datas);
            }
          

            if (is_array(Input::get('colors'))) {
                $deatils = [];
                foreach (Input::get('colors') as $keyx => $feature) {

                    $deatils[] = [
                        'product_id' => $product->id,
                        'color_id' => Input::get('colors')[$keyx],
                        'store_id' => Input::get('store_id')[$keyx],
                        'style_id' => Input::get('style_id')[$keyx],
                        'size_id' => Input::get('size_value_id')[$keyx],
                        'size_number' => Input::get('size_number')[$keyx],
                        'current' => Input::get('size_number')[$keyx],
                    ];
                }
                DB::table('product_stores')->insert($deatils);
            } 
            
            
            Session::flash('success', 'تم الحفظ بنجاح');
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحفظ');
            return Redirect::back();
        
        }
      }
    }
    
    $product = Product_site::find($id);
    $productcolor = Product_color::where('product_id', $id)->get();
    $productsize = Product_site_size::where('product_id', $id)->get();
    $productsizefirst = Product_site_size::where('product_id', $id)->first();
    $productimage = Product_site_image::where('product_id', $id)->where('delete_from_table',0)->groupBy('id')->get();
    // dd($product);
    $productdata = Product_site_data::where('product_id', $id)->get();
    $Category = Category::where('delete_from_table',0)->get();
    $Style = Product_style::where('delete_from_table',0)->get();
    $SizeCode = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',1)->get();
    $SizeNubmer = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',2)->get();

    $productdetails = DB::table('product_colors')
            ->leftjoin('product_sites','product_colors.product_id', '=','product_sites.id')
            ->leftjoin('product_site_sizes','product_colors.colors', '=','product_site_sizes.product_color_id')
            ->leftjoin('product_site_datas','product_colors.colors', '=','product_site_datas.color_id')
            ->leftjoin('product_stores','product_colors.colors', '=','product_stores.color_id')
            ->select('product_colors.*',
            'product_sites.id as pro_id',
            'product_sites.product_main_image',
            'product_site_sizes.id as sitesize_id',
            'product_site_sizes.size_value_id',
            'product_site_sizes.size_value_open',
            'product_site_sizes.size_number',
            'product_site_datas.id as data_id',
            'product_site_datas.Sector_price',
            'product_site_datas.Wholesale_price',
            'product_site_datas.Wholesale_price_two',
            'product_site_datas.Maximum_four',
            'product_site_datas.Wholesale_price_three',
            'product_site_datas.Main_bar_code',
            'product_site_datas.Main_bar_code_two',
            'product_site_datas.store_id',
            'product_stores.size_number as size_number_stor',
            'product_stores.Drawn as Drawn_stor',
            'product_stores.current as current_stor',
            'product_stores.id as storeg_id')
            ->where('product_colors.product_id',$id)
            ->groupBy('product_colors.id')
            ->get();
            // dd($productdetails);

    $ColorSetting = Color_prosetting::where('delete_from_table',0)->where('settingcolor_active',1)->get();
    $OrderType = Order_type::where('delete_from_table',0)->where('order_type_active',1)->where('id',3)->first();
    $store = Main_store::where('delete_from_table',0)->where('store_active',1)->get();        
    return view('backend.Product.editnew',compact('store','OrderType','ColorSetting','productdetails','productsizefirst','product','productcolor','productsize','productimage','productdata','Category','Style','SizeCode','SizeNubmer'));
}

public function EditDetails(Request $request){
    $color_id =$request->input('color_id');
    $data_id = $request->input('data_id');
    $store_id = $request->input('store_id');
    $sitesize_id = $request->input('sitesize_id');
    $product_id =$request->input('product_id');
    if ($request->isMethod('post')) {
        // dd($request->all());
        try{
        if(!empty($color_id)){
            $color = Product_color::find($color_id);
            $color->colors = $request->input('colors_two');
            $color->style_id = $request->input('style_id_two');
            $color->save();
            }
            // dd($color);

            if(!empty($sitesize_id)){
            $size = Product_site_size::find($sitesize_id);
            $size->size_value_id = $request->input('size_value_id_two');
            $size->size_number = $request->input('size_number_two');
            $size->size_value_open = $request->input('size_value_open_two');
            $size->product_color_id = $request->input('colors_two');
            $size->save();
                       
            DB::table('product_site_images')
                ->where('product_sizes_id', '=', $sitesize_id)
                ->where('product_id', '=', $product_id)
                ->update(['product_sizes_id' => $size->size_value_id]);
            
            }
            if(!empty($data_id)){
            $data = Product_site_data::find($data_id);
            $data->Sector_price = $request->input('Sector_price_two');
            $data->Wholesale_price = $request->input('Wholesale_price_two');
            $data->Wholesale_price_two = $request->input('Wholesale_price_two_two');
            $data->Wholesale_price_three = $request->input('Wholesale_price_three_two');
            $data->Maximum_four = $request->input('Maximum_four_two');
            $data->Main_bar_code = $request->input('Main_bar_code_two');
            $data->Main_bar_code_two = $request->input('Main_bar_code_two_two');
            $data->color_id = $request->input('colors_two');
            $data->store_id = $request->input('store_id_two');
            $data->product_sizes_id = $request->input('size_value_id_two');
            $data->save();
            }

            if(!empty($store_id)){
            $store = Product_store::find($store_id);
            $store->color_id = $request->input('colors_two');
            $store->style_id = $request->input('style_id_two');
            $store->store_id = $request->input('store_id_two');
            $store->size_id = $request->input('size_value_id_two');
            $store->size_number = $request->input('size_number_two');
            $store->current = $request->input('size_number_two');
            $store->save();
            }



            if (is_array(Input::file('images'))) {
                $images = [];
                foreach (Input::file('images') as $keyv => $feature) {
                    if (Input::hasFile('images')) {
                        $file = Input::file('images')[$keyv];
                        $path = 'uploads/product/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $imagedeatils = $path . $filename;
                    }
                    $images[] = [
                        'product_id' => $product_id,
                        'product_sizes_id' => $size->size_value_id,
                        'images' => $imagedeatils,
                    ];
                }
                DB::table('product_site_images')->insert($images);
            }

            Session::flash('success', 'تم الحفظ بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحفظ');
            return Redirect::back()->withInput(Input::all());
        
        }
    }
}
public function DeleteProduct($id) {
    try { 
        // DB::table('product_sites')
        //         ->where('id', '=', $id)
        //         ->update(['delete_from_table' => 1]);

        DB::table('product_stores')
        ->where('product_id', '=', $product->id)
        ->delete();
        DB::table('product_site_sizes')
        ->where('product_id', '=', $product->id)
        ->delete();  
        DB::table('product_colors')
        ->where('product_id', '=', $product->id)
        ->delete();
        DB::table('product_site_images')
        ->where('product_id', '=', $product->id)
        ->delete();
        DB::table('product_sites')
        ->where('id', '=', $product->id)
        ->delete();  

        Session::flash('success', 'تم الحذف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الحذف');
        return Redirect::back();
    }
}
public function DeleteProductImages($id) {
    try {
        DB::table('product_site_images')
                ->where('id', '=', $id)
                ->delete();
        Session::flash('success', 'تم الحذف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الحذف');
        return Redirect::back();
    }
}

public function ActiveProduct($id) {
    try {
        DB::table('product_sites')
                ->where('id', '=', $id)
                ->update(['product_active' => 1]);
        Session::flash('success', 'تم التفعيل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التفعيل');
        return Redirect::back()->withInput(Input::all());
    }
}

public function UnActiveProduct($id) {
    try {
        DB::table('product_sites')
                ->where('id', '=', $id)
                ->update(['product_active' => 2]);
        Session::flash('success', 'تم الأيقاف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الأيقاف');
        return Redirect::back()->withInput(Input::all());
    }
}
}
