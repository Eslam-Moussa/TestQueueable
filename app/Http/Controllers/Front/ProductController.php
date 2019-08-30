<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Product_site;
use App\Category;
use App\Product_site_image;
use App\Poster_site;
use App\Comment_product;
use App\Favourit_product;
use Auth;
class ProductController extends Controller
{
   public function GetProduct(){
     $productsite = DB::table('product_sites')
     ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
     ->select('product_sites.*','product_site_datas.Sector_price as Sector_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
     ->where('product_sites.delete_from_table', 0)
     ->where('product_sites.product_active',1)
     ->groupBy('product_sites.id')
     ->paginate(8);
     $poster = Poster_site::first();
     $Category = Category::where('delete_from_table', 0)->where('cat_active',1)->get();
     $productcat = DB::table('product_sites')
        ->select('product_sites.product_name','product_sites.product_slog','product_sites.id','product_sites.category_id')
        ->where('product_sites.product_active', 1)
        ->orderBy('product_sites.id','desc')
        ->groupBy('product_sites.id')
        ->get();
     return view('frontend.Product.allproduct',compact('productcat','productsite','poster','Category'));
   }
 
   public function SingleProduct($id,$slog){
    $product = DB::table('product_sites') 
    ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
    ->select('product_sites.*','product_site_datas.Sector_price as Sector_price',
    DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), 
    DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
    ->where('product_sites.id', $id)
    ->first();
    
    // dd($product);

    $productimage = Product_site_image::where('product_id', $id)->get();
 
    $prodectrelated = DB::table('product_sites')
        ->leftjoin('categories', 'product_sites.category_id', '=', 'categories.id')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_sites.*','product_site_datas.Sector_price as Sector_price', DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('product_sites.id', '!=', $product->id)
        ->where('product_sites.category_id', $product->category_id)
        ->where('product_sites.product_active', 1)
        ->orderByRaw("RAND()")
        ->limit(4)
        ->get();

    $productcolor = DB::table('product_colors')
         ->leftjoin('product_sites','product_colors.product_id', '=','product_sites.id')
         ->leftjoin('color_prosettings','product_colors.colors', '=','color_prosettings.id')
         ->select('product_colors.*','color_prosettings.color_name')
         ->where('product_colors.product_id',$id)
         ->get();

     $productsize = DB::table('product_site_sizes')
        ->leftjoin('product_sites','product_site_sizes.product_id', '=','product_sites.id')
        ->leftjoin('product_sizes','product_site_sizes.size_value_id', '=','product_sizes.id')
        ->select('product_site_sizes.*','product_sizes.size_type','product_sizes.size_value')
        ->where('product_site_sizes.product_id',$id)
        ->get();        
      //  dd($productsize);

      $productstyle = DB::table('product_colors')
         ->leftjoin('product_sites','product_colors.product_id', '=','product_sites.id')
         ->leftjoin('product_styles','product_colors.style_id', '=','product_styles.id')
         ->select('product_colors.style_id','product_styles.settingstyle_desc')
         ->where('product_colors.product_id',$id)
         ->get();
        //  dd($productstyle);

        $productsizenumber = DB::table('product_site_sizes')
        ->leftjoin('product_sites','product_site_sizes.product_id', '=','product_sites.id')
        ->select('product_site_sizes.size_number')
        ->where('product_site_sizes.product_id',$id)
        ->get();  

    $comment = Comment_product::where('product_id', $id)->get();     
    return view('frontend.Product.singleproduct',compact('comment','product','productsizenumber','productstyle','productimage','prodectrelated','productcolor','productsize'));
}

public function OfferProduct(){
  $OffersPro = DB::table('offer_products')
        ->leftjoin('product_sites','offer_products.product_id', '=','product_sites.id')
        ->select('offer_products.*', 'product_sites.product_slog',
        'product_sites.product_name as product_name',
        'product_sites.product_main_image as product_main_image',
        'product_sites.product_desc as product_desc',
        'product_sites.product_Purch_price as product_Purch_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('offer_products.offer_active',1)
        ->orderby('offer_products.id','desc')
        ->paginate(12);
    return view('frontend.Product.offer',compact('OffersPro'));
}

public function CatProduct($cat_slugn){
  $Category = Category::select('id','cat_name','cat_slug')->where('cat_slug', 'like', '%' . $cat_slugn . '%')->first();
  $CatPro = DB::table('product_sites')
        ->leftjoin('categories','product_sites.category_id', '=','categories.id')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_site_datas.Sector_price as Sector_price','product_sites.id', 'product_sites.product_slog','product_sites.product_name as product_name','product_sites.product_main_image as product_main_image','product_sites.product_desc as product_desc','product_sites.product_Purch_price as product_Purch_price',DB::raw('(select COUNT(id) from  comment_products where product_id = product_sites.id) as comment_count'), DB::raw('(select SUM(comment_rate) from  comment_products where product_id = product_sites.id) as sum_rate'))
        ->where('product_sites.category_id',$Category->id)
        ->where('product_sites.product_active',1)
        ->orderby('product_sites.id','desc')
        ->groupBy('product_sites.id')
        ->paginate(12);
    $Categorypro = Category::where('delete_from_table', 0)->where('cat_active',1)->get();
    $productcat = DB::table('product_sites')
        ->leftjoin('product_site_datas','product_sites.id', '=','product_site_datas.product_id')
        ->select('product_site_datas.Sector_price as Sector_price','product_sites.product_name','product_sites.product_slog','product_sites.id','product_sites.category_id')
        ->where('product_sites.product_active', 1)
        ->orderBy('product_sites.id','desc')
        ->groupBy('product_sites.id')
        ->get();
    return view('frontend.Product.catproduct',compact('CatPro','Category','Categorypro','productcat'));
}

public function CommentProduct(Request $request) {
  $user = Auth::user();
  if ($request->isMethod('post')) {
      $data = $request->all();
      $rules = [
          'comment_message' => 'required',
          'comment_rate' => 'required',
          'comment_title' => 'required',
      ];
      $messages = [
          'comment_message.required' => 'حقل مطلوب',
          'comment_rate.required' => 'حقل مطلوب',
          'comment_title.required' => 'حقل مطلوب',
      ];
      $Validator = Validator::make($data, $rules, $messages);
      if ($Validator->fails()) {
          return redirect()->back()->withErrors($Validator);
      } else {
          if (Auth::user()) {
              try {
                  $comment = new Comment_product();
                  $comment->comment_name = $user->name;
                  $comment->comment_mail = $user->email;
                  $comment->comment_rate = $request->input('comment_rate');
                  $comment->comment_message = $request->input('comment_message');
                  $comment->comment_title = $request->input('comment_title');
                  $comment->product_id = $request->input('product_id');
                  $comment->save();
                  Session::flash('success', 'تم التعليق بنجاح');
                  return Redirect::back();
              } catch (\Exception $ex) {
                  Session::flash('error', 'لم يتم التعليق');
                  return Redirect::back();
              }
          } else {
              Session::flash('error', 'لا يمكنك التعليق على المنتج عليك تسجيل الدخول اولا');
              return Redirect::back();
          }
      }
  }
}

public function AddToFav($id) {
    $user = Auth::user();
    $favPro = DB::table('favourit_products')->where('product_id', $id)->first();
    // dd($favPro);
    if (!empty($favPro)) {
    if($favPro->product_id == $id && $favPro->user_id == $user->id){
        Session::flash('error', 'المنتج موجود بالفعل');   
        return Redirect::back();
    }else{
        try {
            $favuser = new Favourit_product();
            $favuser->user_id = $user->id;
            $favuser->product_id = $id;
            $favuser->save();
            Session::flash('success', 'تم أضافه المنتج بنجاح الى المفضله');
            return Redirect::back();
        } catch (Exception $ex) {
            Session::flash('error', 'لم يتم الأضافة');
            return Redirect::back();
        }
    }
    }else{
        try {
            $favuser = new Favourit_product();
            $favuser->user_id = $user->id;
            $favuser->product_id = $id;
            $favuser->save();
            Session::flash('success', 'تم أضافه المنتج بنجاح الى المفضله');
            return Redirect::back();
        } catch (Exception $ex) {
            Session::flash('error', 'لم يتم الأضافة');
            return Redirect::back();
        }
    }

}

}
