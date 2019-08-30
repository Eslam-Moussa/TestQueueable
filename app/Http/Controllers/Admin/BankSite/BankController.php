<?php

namespace App\Http\Controllers\Admin\BankSite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class BankController extends Controller
{
    public function Index(){
        $i = 1;
        $Bank = Bank_site::where('delete_from_table',0)->get();
        $Bankcount = Bank_site::where('delete_from_table', 0)->count();
        $Bankcountactive = Bank_site::where('delete_from_table', 0)->where('Bank_active',1)->count();
        $BankcountUnactive = Bank_site::where('delete_from_table', 0)->where('Bank_active',2)->count();
        return view('backend.Bank.index',compact('i','Bank','Bankcount','Bankcountactive','BankcountUnactive'));
       }
       
       public function AddNewBank(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Bank = new Bank_site();
                    $Bank->Bank_name = $request->input('Bank_name');
                    $Bank->Bank_owner = $request->input('Bank_owner');
                    $Bank->Bank_number_id = $request->input('Bank_number_id');
                    if (Input::hasFile('Bank_logo')) {
                        $file = Input::file('Bank_logo');
                        $path = 'bank/logo/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $Bank->Bank_logo = $path . $filename;
                    }
                    $Bank->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewBank(Request $request) {
        try {
            $Bank = Bank_site::find($request->input('id'));

            $Bank->Bank_name = $request->input('Bank_name');
            $Bank->Bank_owner = $request->input('Bank_owner');
            $Bank->Bank_number_id = $request->input('Bank_number_id');
            if (Input::hasFile('Bank_logo')) {
                $file = Input::file('Bank_logo');
                $path = 'bank/logo/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $Bank->Bank_logo = $path . $filename;
            }

            $Bank->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteBank($id) {
        try {
            DB::table('bank_sites')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveBank($id) {
        try {
            DB::table('bank_sites')
                    ->where('id', '=', $id)
                    ->update(['Bank_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveBank($id) {
        try {
            DB::table('bank_sites')
                    ->where('id', '=', $id)
                    ->update(['Bank_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
