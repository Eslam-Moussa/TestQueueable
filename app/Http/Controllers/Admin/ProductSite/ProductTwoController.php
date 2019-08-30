<?php

namespace App\Http\Controllers\Admin\Productsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTwoController extends Controller
{
    public function IndexProduct(){
        $i = 1;
        $productsite = DB::table('product_sites')
                ->leftjoin('categories','product_sites.category_id', '=','categories.id')
                ->select('product_sites.*', 'categories.cat_name as cat_name')
                ->where('product_sites.delete_from_table', 0)
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
              
            ]; 
            $messages = [
                'category_id.required' => 'مطلوب أختيار القسم',
                'product_name.required' => 'مطلوب أدخال أسم المنتج',
                'product_Purch_price.required' => 'مطلوب أدخال سعر الشراء',
                'product_desc.required' => 'مطلوب أدخال نبذه عن المنتج',
                'product_main_image.required' => 'مطلوب رفع صورة المنتج',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
               
                $product = new Product_site();
                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
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
                if ($request->filled('colors')) {
                    foreach($request->get('colors') as $color){
                        Product_color::create([
                            'colors' => $color,
                            'product_id' => $product->id,
                            'style_id' => $request->input('style_id')
                            
                        ]);
                    }
                }
    
                
                $colorsproduct = Product_color::get();
    
                  foreach ($colorsproduct as $get) {
                  $color_id = $get->id;
                }
    
        
                if($request->input('size_value_open') == 's'){
                if ($request->filled('size_value_id_s')) {
                    foreach($request->get('size_value_id_s') as $values){
                        product_site_size::create([
                            'product_id' => $product->id,
                            'product_color_id' => $color_id,
                            'size_value_id' => $values,
                            'size_value_open' => $request->input('size_value_open'),
                            'size_number' => $request->input('size_number')
                            
                        ]);
                    }
                }
                } else {
                    if ($request->filled('size_value_id_n')) {
                        foreach($request->get('size_value_id_n') as $valuen){
                            product_site_size::create([
                                'product_id' => $product->id,
                                'product_color_id' => $color_id,
                                'size_value_id' => $valuen,
                                'size_value_open' => $request->input('size_value_open'),
                                'size_number' => $request->input('size_number')
                                
                            ]);
                        }
                    }
    
                }
    
                $sizeproducttwo = product_site_size::get();
    
                  foreach ($sizeproducttwo as $get) {
                  $size_id = $get->id;
                }
    
               //add-to-table-product_site_images
                if (is_array(Input::file('images'))) {
                    $images = [];
                    foreach (Input::file('images') as $key => $feature) {
                        if (Input::hasFile('images')) {
                            $file = Input::file('images')[$key];
                            $path = 'uploads/product/';
                            $filename = time() . '.' . $file->getClientOriginalName();
                            $file->move($path, $filename);
                            $imagedeatils = $path . $filename;
                        }
                        $images[] = [
                            'product_id' => $product->id,
                            'product_sizes_id' => $size_id,
                            'images' => $imagedeatils,
                        ];
                    }
    
                    DB::table('product_site_images')->insert($images);
                }
    
    
    
                $sizeproduct = product_site_size::get();
    
                  foreach ($sizeproduct as $get) {
                  $size_id = $get->id;
                }
    
    
                if ($request->filled('Sector_price')) {
                    foreach($request->get('Sector_price') as $price){
                        Product_site_data::create([
                            'product_id' => $product->id,
                            'product_sizes_id' => $size_id,
                            'Sector_price' => $price,
                            'Maximum_one' => $request->input('Maximum_one'),
                            'Wholesale_price' => $request->input('Wholesale_price'),
                            'Maximum_two' => $request->input('Maximum_two'),
                            'Wholesale_price_two' => $request->input('Wholesale_price_two'),
                            'Maximum_three' => $request->input('Maximum_three'),
                            'Main_bar_code' => $request->input('Main_bar_code'),
                            'Main_bar_code_two' => $request->input('Main_bar_code_two'),
                            
                        ]);
                    }
                }
    
                
                Session::flash('success', 'تم الحفظ بنجاح');
            
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            
            
        }
        }
        $Category = Category::where('delete_from_table',0)->get();
        $Style = Product_style::where('delete_from_table',0)->get();
        $SizeCode = Product_size::where('delete_from_table',0)->where('size_type',1)->get();
        $SizeNubmer = Product_size::where('delete_from_table',0)->where('size_type',2)->get();
        return view('backend.Product.add',compact('Category','Style','SizeCode','SizeNubmer'));
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
                
                $product = Product_site::find($id);
                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
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
                    if(empty(Input::get('colors'))){
                        Product_color::where('product_id', $id)->delete();
                       }
                    $deatils = [];
                    foreach (Input::get('colors') as $key => $feature) {
    
                        $deatils[] = [
                            'product_id' => $product->id,
                            'style_id' => Input::get('style_id'),
                            'colors' => Input::get('colors')[$key],
                        ];
                    }
                    DB::table('product_colors')->insert($deatils);
                } elseif(empty(Input::get('colors'))){
                    Product_color::where('product_id', $id)->delete();
                   }
    
                   $colorsproduct = Product_color::get();
    
                   foreach ($colorsproduct as $get) {
                   $color_id = $get->id;
                 }
    
                //add-to-table-product_site_size
                $productsize = Product_site_size::where('product_id',$id)->first();
                $productsize->product_id = $product->id;
                $productsize->product_color_id = $color_id;
                $productsize->size_value_open = $request->input('size_value_open');
                if($request->input('size_value_open') == 's'){
                    $productsize->size_value_id = $request->input('size_value_id_s');
                    $productsize->size_number = $request->input('size_number_s');
                } else {
                    $productsize->size_value_id = $request->input('size_value_id_n');
                    $productsize->size_number = $request->input('size_number_n');
                } 
                $productsize->save();
    
               //add-to-table-product_site_images
                if (is_array(Input::file('images'))) {
                    $images = [];
                    foreach (Input::file('images') as $key => $feature) {
                        if (Input::hasFile('images')) {
                            $file = Input::file('images')[$key];
                            $path = 'uploads/product/';
                            $filename = time() . '.' . $file->getClientOriginalName();
                            $file->move($path, $filename);
                            $imagedeatils = $path . $filename;
                        }
                        $images[] = [
                            'product_id' => $product->id,
                            'product_sizes_id' => $productsize->id,
                            'images' => $imagedeatils,
                        ];
                    }
                    DB::table('product_site_images')->insert($images);
                } 
    
                $productdata = Product_site_data::where('product_id',$id)->first();
                $productdata->product_id = $product->id;
                $productdata->product_sizes_id = $productsize->id;
                $productdata->Sector_price = $request->input('Sector_price');
                $productdata->Maximum_one = $request->input('Maximum_one');
                $productdata->Wholesale_price = $request->input('Wholesale_price');
                $productdata->Maximum_two = $request->input('Maximum_two');
                $productdata->Wholesale_price_two = $request->input('Wholesale_price_two');
                $productdata->Maximum_three = $request->input('Maximum_three');
                $productdata->Main_bar_code = $request->input('Main_bar_code');
                $productdata->Main_bar_code_two = $request->input('Main_bar_code_two');
                $productdata->save();
    
                
                Session::flash('success', 'تم الحفظ بنجاح');
            
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            
            
          }
        }
        $product = Product_site::find($id);
        $productcolor = Product_color::where('product_id', $id)->get();
        $productsize = Product_site_size::where('product_id', $id)->get();
        $productsizefirst = Product_site_size::where('product_id', $id)->first();
        $productimage = Product_site_image::where('product_id', $id)->where('delete_from_table',0)->get();
        $productdata = Product_site_data::where('product_id', $id)->get();
        $Category = Category::where('delete_from_table',0)->get();
        $Style = Product_style::where('delete_from_table',0)->get();
        $SizeCode = Product_size::where('delete_from_table',0)->where('size_type',1)->get();
        $SizeNubmer = Product_size::where('delete_from_table',0)->where('size_type',2)->get();
    
        $productdetails = DB::table('product_colors')
                ->leftjoin('product_sites','product_colors.product_id', '=','product_sites.id')
                ->leftjoin('product_site_sizes','product_colors.id', '=','product_site_sizes.product_color_id')
                ->leftjoin('product_site_datas','product_site_sizes.id', '=','product_site_datas.product_sizes_id')
                ->select('product_colors.*','product_sites.id as pro_id','product_site_sizes.id as sitesize_id','product_site_sizes.size_value_id','product_site_sizes.size_number',
                'product_site_datas.id as data_id','product_site_datas.Sector_price','product_site_datas.Maximum_one','product_site_datas.Wholesale_price',
                'product_site_datas.Maximum_two','product_site_datas.Wholesale_price_two','product_site_datas.Maximum_three',
                'product_site_datas.Main_bar_code','product_site_datas.Main_bar_code_two')
                ->where('product_colors.product_id',$id)
                ->get();
                // dd($productdetails); 
        return view('backend.Product.edit',compact('productdetails','productsizefirst','product','productcolor','productsize','productimage','productdata','Category','Style','SizeCode','SizeNubmer'));
    }
    public function DeleteProduct($id) {
        try {
            DB::table('product_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
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
                    ->update(['delete_from_table' => 1]);
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

    public function AddProductTwo(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
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
                try {
                $product = new Product_site();
                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
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
                            'style_id' => Input::get('style_id'),
                            'colors' => Input::get('colors')[$key],
                        ];
                    }
                    DB::table('product_colors')->insert($deatils);
                }
    
                $colorsproduct = Product_color::get();
    
                  foreach ($colorsproduct as $get) {
                  $color_id = $get->id;
                }
    
                //add-to-table-product_site_size
                $productsize = new Product_site_size();
                $productsize->product_id = $product->id;
                $productsize->product_color_id = $color_id;
                $productsize->size_value_open = $request->input('size_value_open');
                if($request->input('size_value_open') == 's'){
                    $productsize->size_value_id = $request->input('size_value_id_s');
                    $productsize->size_number = $request->input('size_number_s');
                } else {
                    $productsize->size_value_id = $request->input('size_value_id_n');
                    $productsize->size_number = $request->input('size_number_n');
                }
                $productsize->save();
    
               //add-to-table-product_site_images
                if (is_array(Input::file('images'))) {
                    $images = [];
                    foreach (Input::file('images') as $key => $feature) {
                        if (Input::hasFile('images')) {
                            $file = Input::file('images')[$key];
                            $path = 'uploads/product/';
                            $filename = time() . '.' . $file->getClientOriginalName();
                            $file->move($path, $filename);
                            $imagedeatils = $path . $filename;
                        }
                        $images[] = [
                            'product_id' => $product->id,
                            'product_sizes_id' => $productsize->id,
                            'images' => $imagedeatils,
                        ];
                    }
                    DB::table('product_site_images')->insert($images);
                }
    
                $productdata = new Product_site_data();
                $productdata->product_id = $product->id;
                $productdata->product_sizes_id = $productsize->id;
                $productdata->Sector_price = $request->input('Sector_price');
                $productdata->Maximum_one = $request->input('Maximum_one');
                $productdata->Wholesale_price = $request->input('Wholesale_price');
                $productdata->Maximum_two = $request->input('Maximum_two');
                $productdata->Wholesale_price_two = $request->input('Wholesale_price_two');
                $productdata->Maximum_three = $request->input('Maximum_three');
                $productdata->Main_bar_code = $request->input('Main_bar_code');
                $productdata->Main_bar_code_two = $request->input('Main_bar_code_two');
                $productdata->save();
    
                
                Session::flash('success', 'تم الحفظ بنجاح');
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
            
        }
        }
        $Category = Category::where('delete_from_table',0)->where('cat_active',1)->get();
        $Style = Product_style::where('delete_from_table',0)->where('settingstyle_active',1)->get();
        $SizeCode = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',1)->get();
        $SizeNubmer = Product_size::where('delete_from_table',0)->where('settingsize_active',1)->where('size_type',2)->get();
        $ColorSetting = Color_prosetting::where('delete_from_table',0)->where('settingcolor_active',1)->get();
        $OrderType = Order_type::where('delete_from_table',0)->where('order_type_active',1)->where('id',3)->first();
        return view('backend.Product.add',compact('ColorSetting','Category','Style','SizeCode','SizeNubmer','OrderType'));
    }
    
    public function EditProductTwo($id,Request $request){
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
                
                $product = Product_site::find($id);
                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
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
                    if(empty(Input::get('colors'))){
                        Product_color::where('product_id', $id)->delete();
                       }
                    $deatils = [];
                    foreach (Input::get('colors') as $key => $feature) {
    
                        $deatils[] = [
                            'product_id' => $product->id,
                            'style_id' => Input::get('style_id'),
                            'colors' => Input::get('colors')[$key],
                        ];
                    }
                    DB::table('product_colors')->insert($deatils);
                } elseif(empty(Input::get('colors'))){
                    Product_color::where('product_id', $id)->delete();
                   }
    
                   $colorsproduct = Product_color::get();
    
                   foreach ($colorsproduct as $get) {
                   $color_id = $get->id;
                 }
    
                //add-to-table-product_site_size
                $productsize = Product_site_size::where('product_id',$id)->first();
                $productsize->product_id = $product->id;
                $productsize->product_color_id = $color_id;
                $productsize->size_value_open = $request->input('size_value_open');
                if($request->input('size_value_open') == 's'){
                    $productsize->size_value_id = $request->input('size_value_id_s');
                    $productsize->size_number = $request->input('size_number_s');
                } else {
                    $productsize->size_value_id = $request->input('size_value_id_n');
                    $productsize->size_number = $request->input('size_number_n');
                } 
                $productsize->save();
    
               //add-to-table-product_site_images
                if (is_array(Input::file('images'))) {
                    $images = [];
                    foreach (Input::file('images') as $key => $feature) {
                        if (Input::hasFile('images')) {
                            $file = Input::file('images')[$key];
                            $path = 'uploads/product/';
                            $filename = time() . '.' . $file->getClientOriginalName();
                            $file->move($path, $filename);
                            $imagedeatils = $path . $filename;
                        }
                        $images[] = [
                            'product_id' => $product->id,
                            'product_sizes_id' => $productsize->id,
                            'images' => $imagedeatils,
                        ];
                    }
                    DB::table('product_site_images')->insert($images);
                } 
    
                $productdata = Product_site_data::where('product_id',$id)->first();
                $productdata->product_id = $product->id;
                $productdata->product_sizes_id = $productsize->id;
                $productdata->Sector_price = $request->input('Sector_price');
                $productdata->Maximum_one = $request->input('Maximum_one');
                $productdata->Wholesale_price = $request->input('Wholesale_price');
                $productdata->Maximum_two = $request->input('Maximum_two');
                $productdata->Wholesale_price_two = $request->input('Wholesale_price_two');
                $productdata->Maximum_three = $request->input('Maximum_three');
                $productdata->Main_bar_code = $request->input('Main_bar_code');
                $productdata->Main_bar_code_two = $request->input('Main_bar_code_two');
                $productdata->save();
    
                
                Session::flash('success', 'تم الحفظ بنجاح');
            
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            
            
          }
        }
        $product = Product_site::find($id);
        $productcolor = Product_color::where('product_id', $id)->get();
        $productsize = Product_site_size::where('product_id', $id)->get();
        $productsizefirst = Product_site_size::where('product_id', $id)->first();
        $productimage = Product_site_image::where('product_id', $id)->where('delete_from_table',0)->get();
        $productdata = Product_site_data::where('product_id', $id)->get();
        $Category = Category::where('delete_from_table',0)->get();
        $Style = Product_style::where('delete_from_table',0)->get();
        $SizeCode = Product_size::where('delete_from_table',0)->where('size_type',1)->get();
        $SizeNubmer = Product_size::where('delete_from_table',0)->where('size_type',2)->get();
    
        $productdetails = DB::table('product_colors')
                ->leftjoin('product_sites','product_colors.product_id', '=','product_sites.id')
                ->leftjoin('product_site_sizes','product_colors.id', '=','product_site_sizes.product_color_id')
                ->leftjoin('product_site_datas','product_site_sizes.id', '=','product_site_datas.product_sizes_id')
                ->select('product_colors.*','product_sites.id as pro_id','product_site_sizes.id as sitesize_id','product_site_sizes.size_value_id','product_site_sizes.size_number',
                'product_site_datas.id as data_id','product_site_datas.Sector_price','product_site_datas.Maximum_one','product_site_datas.Wholesale_price',
                'product_site_datas.Maximum_two','product_site_datas.Wholesale_price_two','product_site_datas.Maximum_three',
                'product_site_datas.Main_bar_code','product_site_datas.Main_bar_code_two')
                ->where('product_colors.product_id',$id)
                ->get();
                // dd($productdetails);
        return view('backend.Product.edit',compact('productdetails','productsizefirst','product','productcolor','productsize','productimage','productdata','Category','Style','SizeCode','SizeNubmer'));
    }
}
