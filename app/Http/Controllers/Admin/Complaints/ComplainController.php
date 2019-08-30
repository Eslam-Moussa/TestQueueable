<?php

namespace App\Http\Controllers\Admin\Complaints;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Complain_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ComplainController extends Controller
{
    public function GetComplain(){
        $i = 1;
        $Complaints = Complain_site::where('delete_from_table',0)->get();
        $Complaintscount = Complain_site::where('delete_from_table', 0)->count();
        $Complaintscountactive = Complain_site::where('delete_from_table', 0)->where('complain_active',1)->count();
        $ComplaintscountUnactive = Complain_site::where('delete_from_table', 0)->where('complain_active',2)->count();
        return view('backend.Complaints.index',compact('i','Complaints','Complaintscount','Complaintscountactive','ComplaintscountUnactive'));
    }

    public function EditComplain($id,Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            try {
                $complain = Complain_site::find($id);
                $complain->complain_replay = $request->input('complain_replay');
                if (Input::hasFile('complain_replay_image')) {
                    $file = Input::file('complain_replay_image');
                    $path = 'complain/image/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $complain->complain_replay_image = $path . $filename;
                }
                $complain->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        } 
    
        $complain = Complain_site::find($id);
        return view('backend.Complaints.show',compact('complain'));
    }

    public function DeleteComplain($id) {
        try {
            DB::table('complain_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveComplain($id) {
        try {
            DB::table('complain_sites')
                    ->where('id', '=', $id)
                    ->update(['complain_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveComplain($id) {
        try {
            DB::table('complain_sites')
                    ->where('id', '=', $id)
                    ->update(['complain_active' => 2]);
            Session::flash('success', 'تم الغلق بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الغلق');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
