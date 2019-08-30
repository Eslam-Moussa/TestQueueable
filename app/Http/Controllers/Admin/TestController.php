<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function AddProduct(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
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
                
                if (is_array(Input::get('colors'))) {
                   
                    $product_colors = [];
                    foreach (Input::get('colors') as $key => $feature) {
    
                        $product_colors[] = [
                            'product_id' => $product->id,
                            'style_id' => Input::get('style_id')[$key],
                            'colors' => Input::get('colors')[$key],
                        ];
                    }
                    
                   
                   DB::table('product_colors')->insert($product_colors);
                }
    
                $colorsproduct = Product_color::get();
    
                  foreach ($colorsproduct as $get) {
                  $color_id = $get->id;
                }
                
            //     //add-to-table-product_site_size
            //     $productsize = new Product_site_size();
            //     $productsize->product_id = $product->id;
            //     $productsize->product_color_id = $color_id;
            //     $productsize->size_value_open = $request->input('size_value_open');
    
            //     if($request->input('size_value_open') == 's'){
            //         $productsize->size_value_id = $request->input('size_value_id_s');
            //         $productsize->size_number = $request->input('size_number_s');
            //     } else {
            //         $productsize->size_value_id = $request->input('size_value_id_n');
            //         $productsize->size_number = $request->input('size_number_n');
            //     }
                
            //     $productsize->save();
    
            //    //add-to-table-product_site_images
            //     if (is_array(Input::file('images'))) {
            //         $images = [];
            //         foreach (Input::file('images') as $key => $feature) {
            //             if (Input::hasFile('images')) {
            //                 $file = Input::file('images')[$key];
            //                 $path = 'uploads/product/';
            //                 $filename = time() . '.' . $file->getClientOriginalName();
            //                 $file->move($path, $filename);
            //                 $imagedeatils = $path . $filename;
            //             }
            //             $images[] = [
            //                 'product_id' => $product->id,
            //                 'product_sizes_id' => $productsize->id,
            //                 'images' => $imagedeatils,
            //             ];
            //         }
            //         DB::table('product_site_images')->insert($images);
            //     }
            
                if (is_array(Input::get('size_value_id_s'))) {
                    $product_site_datas = [];
                    foreach (Input::get('size_value_id_s') as $key => $feature) {
    
                         $product_site_datas[] = [
                            'product_id' => $product->id,
                            // 'product_sizes_id' => Input::get('size_value_id_s')[$key],
                            'Sector_price' => Input::get('Sector_price')[$key],
                            'Maximum_one' => Input::get('Maximum_one')[$key],
                            'Wholesale_price' => Input::get('Wholesale_price')[$key],
                            'Maximum_two' => Input::get('Maximum_two')[$key],
                            'Wholesale_price_two' => Input::get('Wholesale_price_two')[$key],
                            'Maximum_three' => Input::get('Maximum_three')[$key],
                            'Main_bar_code' => Input::get('Main_bar_code')[$key],
                            'Main_bar_code_two' => Input::get('Main_bar_code_two')[$key],
                        ];
                    }
                    DB::table('product_site_datas')->insert($product_site_datas);
                }
        
                // $productdata = new Product_site_data();
                // $productdata->product_id = $product->id;
                // $productdata->product_sizes_id = $productsize->id;
                // $productdata->Sector_price = $request->input('Sector_price');
                // $productdata->Maximum_one = $request->input('Maximum_one');
                // $productdata->Wholesale_price = $request->input('Wholesale_price');
                // $productdata->Maximum_two = $request->input('Maximum_two');
                // $productdata->Wholesale_price_two = $request->input('Wholesale_price_two');
                // $productdata->Maximum_three = $request->input('Maximum_three');
                // $productdata->Main_bar_code = $request->input('Main_bar_code');
                // $productdata->Main_bar_code_two = $request->input('Main_bar_code_two');
                // $productdata->save();
    
                
            
            
        }
        }
        $Category = Category::where('delete_from_table',0)->get();
        $Style = Product_style::where('delete_from_table',0)->get();
        $SizeCode = Product_size::where('delete_from_table',0)->where('size_type',1)->get();
        $SizeNubmer = Product_size::where('delete_from_table',0)->where('size_type',2)->get();
        return view('backend.Product.add',compact('Category','Style','SizeCode','SizeNubmer'));
    }
}
