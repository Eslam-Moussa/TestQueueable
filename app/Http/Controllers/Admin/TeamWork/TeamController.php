<?php

namespace App\Http\Controllers\Admin\TeamWork;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team_work;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class TeamController extends Controller
{
    public function Index(){
        $i = 1;
        $Team = Team_work::where('delete_from_table',0)->get();
        $Teamfirst = Team_work::where('delete_from_table',0)->first();
           return view('backend.TeamWork.index',compact('i','Team','Teamfirst'));
       }
       
       public function AddNewTeamWork(Request $request){
        if ($request->isMethod('post')) {
                try {
                    $Team = new Team_work();
                    $Team->team_name = $request->input('team_name');
                    $Team->team_position = $request->input('team_position');

                    if (Input::hasFile('team_image')) {
                        $file = Input::file('team_image');
                        $path = 'TeamWork/image/';
                        $filename = time() . '.' . $file->getClientOriginalName();
                        $file->move($path, $filename);
                        $Team->team_image = $path . $filename;
                    }
                    $Team->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            
           }
       }
    
       public function EditNewTeamWork(Request $request) {
        try {
            $Team = Team_work::find($request->input('id'));

            $Team->team_name = $request->input('team_name');
            $Team->team_position = $request->input('team_position');

            if (Input::hasFile('team_image')) {
                $file = Input::file('team_image');
                $path = 'TeamWork/image/';
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move($path, $filename);
                $Team->team_image = $path . $filename;
            }

            $Team->save();
            Session::flash('success', 'تم التعديل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التعديل');
            return Redirect::back();
        }
    }
    public function DeleteTeamWork($id) {
        try {
            DB::table('team_works')
                    ->where('id', '=', $id)
                    ->update(['delete_from_table' => 1]);
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    
    public function ActiveTeamWork($id) {
        try {
            DB::table('team_works')
                    ->where('id', '=', $id)
                    ->update(['team_active' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }
    
    public function UnActiveTeamWork($id) {
        try {
            DB::table('team_works')
                    ->where('id', '=', $id)
                    ->update(['team_active' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}
