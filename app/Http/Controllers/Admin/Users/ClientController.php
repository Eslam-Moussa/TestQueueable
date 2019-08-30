<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\client_type;
use App\User;
use App\City;
use App\Area;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ClientController extends Controller
{
    public function IndexClient(){
        $i = 1;
        $UsersSite = DB::table('users')
            ->leftjoin('client_types','users.clienttyp_id', '=','client_types.id')
            ->select('users.*', 'client_types.clienttyp_name as clienttyp_name')
            ->where('users.user_type', 2)
            ->where('users.delete_from_table',0)
            ->get();
        $Userscount = User::where('user_type', 2)->where('delete_from_table', 0)->count();
        $Userscountactive = User::where('user_type', 2)->where('delete_from_table', 0)->where('user_active',1)->count();
        $UserscountUnactive = User::where('user_type', 2)->where('delete_from_table', 0)->where('user_active',2)->count();
        return view('backend.User.Client.index',compact('i','UserscountUnactive','Userscountactive','Userscount','UsersSite'));
    }

    public function AddNewClient(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'user_phone' => 'required',
                'country_id' => 'required',
                'city_id' => 'required',
                'area_id' => 'required',
                'clienttyp_id' => 'required',
            ];
            $messages = [ 
                'name.required' => 'مطلوب ادخال الأسم الأول',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
                'email.unique' => 'البريد الإلكترونى',
                'password.required' => 'مطلوب ادخال كلمه المرور ',
                'user_phone.required' => 'مطلوب ادخال رقم الهاتف',
                'country_id.required' => 'يجب أختيار البلد',
                'city_id.required' => 'يجب أختيار المدينة',
                'area_id.required' => 'يجب أختيار المنطقة',
                'clienttyp_id.required' => 'يجب أختيار النوع',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else { 
                try {
                    $user = new User();
                    $user->name = $request->input('name');
                    $user->user_secondname = $request->input('user_secondname');
                    $user->email = $request->input('email');
                    $user->user_phone = $request->input('user_phone');
                    $user->country_id = $request->input('country_id');
                    $user->city_id = $request->input('city_id');
                    $user->area_id = $request->input('area_id');
                    $user->user_address = $request->input('user_address');
                    $user->clienttyp_id = $request->input('clienttyp_id');
                    $user->time_close = $request->input('time_close');
                    $user->time_cart = $request->input('time_cart');
                    $user->payment_methoud = $request->input('payment_methoud');
                    $user->user_social_id = $request->input('user_social_id');

                    if (!empty($request->input('password'))) {
                        $user->password = bcrypt($request->input('password'));
                    }

                    if (Input::hasFile('user_photo')) {
                        $file = Input::file('user_photo');
                        $path = 'user/images/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $user->user_photo = $path . $filename;
                    }
                    $user->user_type = 2;

                    $user->save();
                    Session::flash('success', 'تم اضافة المستخدم بنجاح');
                    return Redirect('admin/SiteClient');
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم اضافة المستخدم');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
    $Country = Country::where('delete_from_table', 0)->where('country_active',1)->get();
    $Type = client_type::where('delete_from_table',0)->where('clienttyp_active',1)->get();
    return view('backend.User.Client.add',compact('Country','Type'));
    } 

    public function EditClient($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'user_phone' => 'required',
                'country_id' => 'required',
                'city_id' => 'required',
                'area_id' => 'required',
                'clienttyp_id' => 'required',
            ];
            $messages = [
                'name.required' => 'مطلوب ادخال الأسم الأول',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
                'user_phone.required' => 'مطلوب ادخال رقم الهاتف',
                'country_id.required' => 'يجب أختيار البلد',
                'city_id.required' => 'يجب أختيار المدينة',
                'area_id.required' => 'يجب أختيار المنطقة',
                'clienttyp_id.required' => 'يجب أختيار النوع',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                    $user = User::find($id);
                    $user->name = $request->input('name');
                    $user->user_secondname = $request->input('user_secondname');
                    $user->email = $request->input('email');
                    $user->user_phone = $request->input('user_phone');
                    $user->country_id = $request->input('country_id');
                    $user->city_id = $request->input('city_id');
                    $user->area_id = $request->input('area_id');
                    $user->user_address = $request->input('user_address');
                    $user->clienttyp_id = $request->input('clienttyp_id');
                    $user->time_close = $request->input('time_close');
                    $user->time_cart = $request->input('time_cart');
                    $user->payment_methoud = $request->input('payment_methoud');
                    $user->user_social_id = $request->input('user_social_id');

                    if (!empty($request->input('password'))) {
                        $user->password = bcrypt($request->input('password'));
                    }

                    if (Input::hasFile('user_photo')) {
                        $file = Input::file('user_photo');
                        $path = 'user/images/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $user->user_photo = $path . $filename;
                    }

                    $user->save();
                    Session::flash('success', 'تم التعديل بنجاح');
                    return Redirect('admin/SiteClient');
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم التعديل ');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
    $UserSite = User::find($id);
    $Country = Country::where('delete_from_table', 0)->where('country_active',1)->get();
    $City = City::where('delete_from_table', 0)->where('city_active',1)->get();
    $Type = client_type::where('delete_from_table',0)->where('clienttyp_active',1)->get();
    $Area = Area::where('delete_from_table', 0)->where('area_active',1)->get();
    return view('backend.User.Client.edit',compact('UserSite','Country','Type','City','Area'));
    } 

    public function DeleteClientUser($id) {

        try {
            DB::table('users')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveClientUser($id) {
        try {

            DB::table('users')
                    ->where('id', '=', $id)
                    ->update(['user_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveClientUser($id) {
        try {

            DB::table('users')
                    ->where('id', '=', $id)
                    ->update(['user_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }

    public function OpenTime(Request $request) {
        if ($request->ajax()) {
            $TypeTime = DB::table('client_types')->where('delete_from_table',0)->where('clienttyp_active',1)->where('id', $request->clienttyp_id)->get();
            $data = view('backend.User.Client.ajax-time', compact('TypeTime'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function OpenCart(Request $request) {
        if ($request->ajax()) {
            $TypeCart = DB::table('client_types')->where('delete_from_table',0)->where('clienttyp_active',1)->where('id', $request->clienttyp_id)->get();
            $data = view('backend.User.Client.ajax-cart', compact('TypeCart'))->render();
            return response()->json(['options' => $data]);
        }
    }
}
