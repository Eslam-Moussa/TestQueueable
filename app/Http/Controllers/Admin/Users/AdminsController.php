<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\permission_group;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class AdminsController extends Controller
{
    public function IndexAdmin(){
        $i = 1;
        $AdminSite = User::where('user_type', 1)->where('delete_from_table',0)->get();
        $admincount = User::where('user_type', 1)->where('delete_from_table', 0)->count();
        $admincountactive = User::where('user_type', 1)->where('delete_from_table', 0)->where('user_active',1)->count();
        $admincountUnactive = User::where('user_type', 1)->where('delete_from_table', 0)->where('user_active',2)->count();
        return view('backend.User.Admins.index',compact('i','AdminSite','admincount','admincountactive','admincountUnactive'));
    }
    public function AddNewAdmin(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'user_phone' => 'required',
                'permission_id' => 'required',
            ];
            $messages = [
                'name.required' => 'مطلوب ادخال الاسم',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
                'email.unique' => 'البريد الإلكترونى موجود بالفعل',
                'password.required' => 'مطلوب ادخال كلمه المرور ولا يقل عن 6 احرف',
                'password.confirmed' => 'كلمة المرور ليست متطابقة',
                'user_phone.required' => 'مطلوب ادخال رقم الهاتف',
                'permission_id.required' => 'يجب أختيار صلاحيه العضو',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                    $user = new User();
                    $user->name = $request->input('name');
                    $user->email = $request->input('email');
                    $user->user_phone = $request->input('user_phone');
                    $user->permission_id = $request->input('permission_id');

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
                    $user->user_type = 1;

                    $user->save();
                    Session::flash('success', 'تم اضافة المدير بنجاح');
                    return Redirect('admin/SiteAdmin');
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم اضافة المدير');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        $permisiion = permission_group::where('delete_from_table',0)->where('group_active',1)->get();
        return view('backend.User.Admins.add',compact('permisiion'));
    }

    public function EditAdmin($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:6',
                'user_phone' => 'required',
                'permission_id' => 'required',
            ];
            $messages = [
                'name.required' => 'مطلوب ادخال الاسم',
                'email.required' => 'مطلوب ادخال البريد الإلكترونى',
                'password.required' => 'مطلوب ادخال كلمه المرور ',
                'user_phone.required' => 'مطلوب ادخال رقم الهاتف',
                'permission_id.required' => 'يجب أختيار صلاحيه العضو',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                    $user = User::find($id);
                    $user->name = $request->input('name');
                    $user->email = $request->input('email');
                    $user->user_phone = $request->input('user_phone');
                    $user->permission_id = $request->input('permission_id');

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
                    $user->user_type = 1;

                    $user->save();
                    Session::flash('success', 'تم التعديل بنجاح');
                    return Redirect('admin/SiteAdmin');
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم التعديل ');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        $useradmin = User::find($id);
        $permisiion = permission_group::where('delete_from_table',0)->where('group_active',1)->get();
        return view('backend.User.Admins.edit', compact('useradmin','permisiion'));
    }

    public function DeleteAdminUser($id) {

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
    
    public function ActiveAdminUser($id) {
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
    
    public function UnActiveAdminUser($id) {
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
}
