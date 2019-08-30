<?php

namespace App\Http\Controllers\Admin\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store_phone;
use App\Main_store;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class MainController extends Controller
{
    public function IndexStore(){
        $i = 1;
        $store = Main_store::where('delete_from_table',0)->get();
        return view('backend.MainStore.index',compact('i','store'));
    }

    public function AddStore(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                'store_name' => 'required',
                'store_address' => 'required',
                'store_admin_name' => 'required',
                'store_phone' => 'required',
              
            ]; 
            $messages = [
                'store_name.required' => 'مطلوب أدخال اسم المخزن',
                'store_address.required' => 'مطلوب أدخال عنوان المخزن',
                'store_admin_name.required' => 'مطلوب أدخال اسم المسئول',
                'store_phone.required' => 'مطلوب أدخال رقم هاتف ',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $store = new Main_store();
                $store->store_name = $request->input('store_name');
                $store->store_address = $request->input('store_address');
                $store->store_admin_name = $request->input('store_admin_name');
                
                $store->save();

                //add-to-table-store_phone
                if (is_array(Input::get('store_phone'))) {
                    $deatils = [];
                    foreach (Input::get('store_phone') as $key => $feature) {

                        $deatils[] = [
                            'store_id' => $store->id,
                            'stor_phone' => Input::get('store_phone')[$key],
                        ];
                    }
                    DB::table('store_phones')->insert($deatils);
                }
 
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back()->withInput(Input::all());
            }
          }
        }
        return view('backend.MainStore.add');
    }

    public function EditStore($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'store_name' => 'required',
                'store_address' => 'required',
                'store_admin_name' => 'required',
              
            ]; 
            $messages = [
                'store_name.required' => 'مطلوب أدخال اسم الشركة',
                'store_address.required' => 'مطلوب أدخال عنوان الشركة',
                'store_admin_name.required' => 'مطلوب أدخال اسم المسئول',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $store = Main_store::find($id);
                $store->store_name = $request->input('store_name');
                $store->store_address = $request->input('store_address');
                $store->store_admin_name = $request->input('store_admin_name');
                
                $store->save();

                //add-to-table-store_phone
                if (is_array(Input::get('store_phone'))) {
                    Store_phone::where('store_id', $store->id)->delete();
                    $deatils = [];
                    foreach (Input::get('store_phone') as $key => $feature) {

                        $deatils[] = [
                            'store_id' => $store->id,
                            'stor_phone' => Input::get('store_phone')[$key],
                        ];
                    }
                    DB::table('store_phones')->insert($deatils);

                } elseif(empty(Input::get('store_phone'))){
                    Store_phone::where('store_id', $store->id)->delete();
                   }

                
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
          }
        }
        $store = Main_store::find($id);
        $phone = Store_phone::where('delete_from_table', 0)->where('store_id',$store->id)->first();
        $phoneall = Store_phone::where('delete_from_table', 0)
        ->where('store_id',$store->id)
        ->where('id','!=',$phone->id)
        ->get();
        return view('backend.MainStore.edit',compact('store','phone','phoneall'));
    }

    public function DeleteStore($id) {
        try {
            DB::table('main_stores')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function DeleteStorePhone($id) {
        try {
            DB::table('store_phones')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveStore($id) {
        try {
            DB::table('main_stores')
                    ->where('id', '=', $id)
                    ->update(['store_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveStore($id) {
        try {
            DB::table('main_stores')
                    ->where('id', '=', $id)
                    ->update(['store_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
