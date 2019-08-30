<?php

namespace App\Http\Controllers\Admin\ProductSite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Main_store;
use App\Product_store;
use App\stored_current_product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class StoreController extends Controller
{
    public function StoreProduct($id){
       $i = 1;
        $store = Main_store::where('id',$id)->first();

        $productstore = DB::table('product_stores')
            ->leftjoin('main_stores','product_stores.store_id', '=','main_stores.id')
            ->leftjoin('product_sites','product_stores.product_id', '=','product_sites.id')
            ->leftjoin('categories','product_sites.category_id', '=','categories.id')
            ->leftjoin('color_prosettings','product_stores.color_id', '=','color_prosettings.id')
            ->leftjoin('product_styles','product_stores.style_id', '=','product_styles.id')
            ->leftjoin('product_sizes','product_stores.size_id', '=','product_sizes.id')
            ->select('product_stores.*','main_stores.store_name as store_name','product_sites.product_name as product_name',
            'categories.cat_name as cat_name','color_prosettings.color_name as color_name',
            'product_styles.settingstyle_desc as settingstyle_desc','product_sizes.size_value as size_value')
            ->where('product_stores.store_id',$id)
            ->get();

            // dd($productstore);

        $storecurrent = stored_current_product::where('pro_store_id',$id)->get();
        $z =1;
        return view('backend.MainStore.product',compact('i','z','storecurrent','store','productstore'));
    }
    public function EditStoreProduct(Request $request){
        try {
            $store = Product_store::find($request->input('id'));
            $store->current += $request->input('prodect_number');
            $store->save();

            $storecurrent = new stored_current_product();
            $storecurrent->pro_store_id = $store->id;
            $storecurrent->new_current = $request->input('prodect_number');
            $storecurrent->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
}
