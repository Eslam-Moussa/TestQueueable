<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\permission_group;
use App\permissions;
class PermissionsController extends Controller
{
    public function GetPermissions() {
        $i = 1;
        $permisiion = permission_group::get();
        return view('backend.Permissions.index', compact('permisiion', 'i'));
    }

    public function AddPermissions(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title_per' => 'required',
            ];
            $messages = [
                'title_per.required' => 'الاسم  مطلوب ادخالة',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                $permisiion = new permission_group();
                $permisiion->title_per = $request->input('title_per');
                $permisiion->save();

                if (is_array(Input::get('per_name'))) {
                    $deatils = [];
                    foreach (Input::get('per_name') as $key => $feature) {

                        $deatils[] = [
                            'per_id' => $permisiion->id,
                            'per_name' => Input::get('per_name')[$key],
                        ];
                    }
                    DB::table('permissions')->insert($deatils);
                }

                try {
                    Session::flash('success', 'تم الأضافة بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الأضافة');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        return view('backend.Permissions.add');
    }

    public function EditPermissions($id ,Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title_per' => 'required',
            ];
            $messages = [
                'title_per.required' => 'الاسم  مطلوب ادخالة',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                $permisiion = permission_group::find($id);
                $permisiion->title_per = $request->input('title_per');
                $permisiion->save();

                if (is_array(Input::get('per_name'))) {
                    permissions::where('per_id', $permisiion->id)->delete();
                    $deatils = [];
                    foreach (Input::get('per_name') as $key => $feature) {

                        $deatils[] = [
                            'per_id' => $permisiion->id,
                            'per_name' => Input::get('per_name')[$key],
                        ];
                    }
                    DB::table('permissions')->insert($deatils);
                }

                try {
                    Session::flash('success', 'تم الأضافة بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الأضافة');
                    return Redirect::back()->withInput(Input::all());
                }
            }
        }
        $pergroup = permission_group::find($id);
        $permission = permissions::where('per_id', $id)->lists('per_name')->toArray();
        return view('backend.Permissions.edit',compact('pergroup','permission'));
    }

    public function Deletepermission($id) {

        try {
            DB::table('permission_groups')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function Activepermission($id) {
        try {

            DB::table('permission_groups')
                    ->where('id', '=', $id)
                    ->update(['group_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActivepermission($id) {
        try {

            DB::table('permission_groups')
                    ->where('id', '=', $id)
                    ->update(['group_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
