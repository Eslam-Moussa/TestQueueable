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
use Auth;
class AuthUserController extends Controller
{
    public function Login(Request $request){
        if ($request->isMethod('post')) {
            if (!Auth::check()) {
                if ($request->isMethod('post')) {
                    $data = [
                        'email' => $request->input('email'),
                        'password' => $request->input('password')
                    ];
                    if (Auth::attempt($data, true)) {
                         if (Auth::user()->user_active == 2) {
                        Session::flash('error','هذا الحساب غير متفعل');
                        return Redirect::back();
                        Auth::logout();
                    } else {
                         return Redirect::to('/');
                    }
                        
                       
                    } else {
                        Session::flash('error', 'بيانات الدخول غير متطابقه');
                        return Redirect::back()->withInput(Input::all());
                    }
                }

            } else {
                return Redirect::back();
            }
        }
        return view('frontend.AuthUser.login');
    }

    public function Register(Request $request){
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
                'payment_methoud' => 'required',
                'user_address' => 'required',
            ];
            $messages = [
                'name.required' => 'مطلوب ادخال الأسم الأول',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
                'email.unique' => 'البريد الإلكترونى موجود بالفعل',
                'password.required' => 'مطلوب ادخال كلمه المرور ',
                'password.confirmed' => 'كلمه المرور غير متطابقه',
                'user_phone.required' => 'مطلوب ادخال رقم الهاتف',
                'country_id.required' => 'يجب أختيار البلد',
                'city_id.required' => 'يجب أختيار المدينة',
                'area_id.required' => 'يجب أختيار المنطقة',
                'payment_methoud.required' => 'يجب أختيار طريقه الدفع المفضله',
                'user_address.required' => 'يجب ادخال العنوان',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else { 
                try {
                    $client = new User();
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
                    Session::flash('success', 'تم اضافة الأضافه');
                    return Redirect::to('/');
                } catch (\Exception $ex) {
                    Session::flash('error', 'تم أضافتك بنجاح');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        $Country = Country::where('delete_from_table', 0)->where('country_active',1)->get();
        return view('frontend.AuthUser.register',compact('Country'));
    }
}
