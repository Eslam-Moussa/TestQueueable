<?php

namespace App\Http\Controllers\Admin\Shipping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;
use App\Shipping_compani;
use App\Shipping_phone;
use App\Shipping_area;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ShippingCompanyController extends Controller
{
    public function ShippingCompany(){
        $i = 1;
        $shipping = Shipping_compani::where('delete_from_table',0)->get();
        return view('backend.ShippingCompany.index',compact('shipping','i'));
    }

    public function AddShippingCompany(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'ship_name' => 'required',
                'ship_address' => 'required',
                'ship_admin_name' => 'required',
                'ship_image' => 'required',
                'ship_area_id' => 'required',
                'ship_phone' => 'required',
              
            ]; 
            $messages = [
                'ship_name.required' => 'مطلوب أدخال اسم الشركة',
                'ship_address.required' => 'مطلوب أدخال عنوان الشركة',
                'ship_admin_name.required' => 'مطلوب أدخال اسم المسئول',
                'ship_image.required' => 'مطلوب رفع صورة الشركة',
                'ship_area_id.required' => 'مطلوب أختيار المنطقة',
                'ship_phone.required' => 'مطلوب أدخال رقم هاتف ',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $shipping = new Shipping_compani();
                $shipping->ship_name = $request->input('ship_name');
                $shipping->ship_address = $request->input('ship_address');
                $shipping->ship_admin_name = $request->input('ship_admin_name');
                
                if (Input::hasFile('ship_image')) {
                    $file = Input::file('ship_image');
                    $path = 'shipping/image/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $shipping->ship_image = $path . $filename;
                }
                $shipping->save();
                //add-to-table-shipping_area
                if (is_array(Input::get('ship_area_id'))) {
                    $deatils = [];
                    foreach (Input::get('ship_area_id') as $key => $feature) {

                        $deatils[] = [
                            'shipping_id' => $shipping->id,
                            'ship_area_id' => Input::get('ship_area_id')[$key],
                        ];
                    }
                    DB::table('shipping_areas')->insert($deatils);
                }

                //add-to-table-shipping_phone
                if (is_array(Input::get('ship_phone'))) {
                    $deatils = [];
                    foreach (Input::get('ship_phone') as $key => $feature) {

                        $deatils[] = [
                            'shipping_id' => $shipping->id,
                            'ship_phone' => Input::get('ship_phone')[$key],
                        ];
                    }
                    DB::table('shipping_phones')->insert($deatils);
                }

                
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
        }

        $Areas = Area::where('delete_from_table', 0)->where('area_active',1)->get();
        return view('backend.ShippingCompany.add',compact('Areas'));
    }

    public function EditShippingCompany($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'ship_name' => 'required',
                'ship_address' => 'required',
                'ship_admin_name' => 'required',
                
                'ship_area_id' => 'required',
                'ship_phone' => 'required',
              
            ]; 
            $messages = [
                'ship_name.required' => 'مطلوب أدخال اسم الشركة',
                'ship_address.required' => 'مطلوب أدخال عنوان الشركة',
                'ship_admin_name.required' => 'مطلوب أدخال اسم المسئول',
              
                'ship_area_id.required' => 'مطلوب أختيار المنطقة',
                'ship_phone.required' => 'مطلوب أدخال رقم هاتف ',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
            try {
                $shipping =  Shipping_compani::find($id);
                $shipping->ship_name = $request->input('ship_name');
                $shipping->ship_address = $request->input('ship_address');
                $shipping->ship_admin_name = $request->input('ship_admin_name');
                
                if (Input::hasFile('ship_image')) {
                    $file = Input::file('ship_image');
                    $path = 'shipping/image/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $shipping->ship_image = $path . $filename;
                }
                $shipping->save();
                //add-to-table-shipping_area
                if (is_array(Input::get('ship_area_id'))) {
                    Shipping_area::where('shipping_id', $shipping->id)->delete();
                    $deatils = [];
                    foreach (Input::get('ship_area_id') as $key => $feature) {

                        $deatils[] = [
                            'shipping_id' => $shipping->id,
                            'ship_area_id' => Input::get('ship_area_id')[$key],
                        ];
                    }
                    DB::table('shipping_areas')->insert($deatils);
                } elseif(empty(Input::get('ship_area_id'))){
                 Shipping_area::where('shipping_id', $shipping->id)->delete();
                }

                //add-to-table-shipping_phone
                if (is_array(Input::get('ship_phone'))) {
                    Shipping_phone::where('shipping_id', $shipping->id)->delete();
                    $deatils = [];
                    foreach (Input::get('ship_phone') as $key => $feature) {

                        $deatils[] = [
                            'shipping_id' => $shipping->id,
                            'ship_phone' => Input::get('ship_phone')[$key],
                        ];
                    }
                    DB::table('shipping_phones')->insert($deatils);
                } elseif(empty(Input::get('ship_phone'))){
                    Shipping_phone::where('shipping_id', $shipping->id)->delete();
                   }

                
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
        }

        $shipping =  Shipping_compani::find($id);
        $Areas = Area::where('delete_from_table', 0)->where('area_active',1)->get();
        $phone = Shipping_phone::where('delete_from_table', 0)->where('shipping_id',$shipping->id)->first();
        $phoneall = Shipping_phone::where('delete_from_table', 0)
        ->where('shipping_id',$shipping->id)
        ->where('id','!=',$phone->id)
        ->get();
        $AreasShip = Shipping_area::where('delete_from_table', 0)->where('shipping_id',$shipping->id)->get();
        return view('backend.ShippingCompany.edit',compact('AreasShip','phone','phoneall','Areas','shipping'));
    }

    public function DeleteShippingCompany($id) {
        try {
            DB::table('shipping_companis')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function DeleteShippingPhone($id) {
        try {
            DB::table('shipping_phones')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveShippingCompany($id) {
        try {
            DB::table('shipping_companis')
                    ->where('id', '=', $id)
                    ->update(['ship_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveShippingCompany($id) {
        try {
            DB::table('shipping_companis')
                    ->where('id', '=', $id)
                    ->update(['ship_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
