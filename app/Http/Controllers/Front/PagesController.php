<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Complain_site;
use App\Policy_site;
use App\Condition_site;
use App\AboutUs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class PagesController extends Controller
{
   public function Contact(Request $request){
    if ($request->isMethod('post')) {
        $data = $request->all();
        $rules = [
            'complain_name' => 'required',
            'complain_mail' => 'required|email',
            'complain_desc' => 'required',
            'complain_reason' => 'required',
        ];
        $messages = [
            'complain_name.required' => 'حقل مطلوب',
            'complain_mail.required' => 'حقل مطلوب',
            'complain_desc.required' => 'حقل مطلوب',
            'complain_reason.required' => 'حقل مطلوب',
        ];
        $Validator = Validator::make($data, $rules, $messages);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator);
        } else {
            try {
                $contact = new Complain_site();
                $contact->complain_name = $request->input('complain_name');
                $contact->complain_mail = $request->input('complain_mail');
                $contact->complain_desc = $request->input('complain_desc');
                $contact->complain_reason = $request->input('complain_reason');
                $contact->save();
                Session::flash('success', 'تم الأرسال بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الأرسال ');
                return Redirect::back();
            }
        }
    }
       return view('frontend.ContactUs.contact');
   }
   public function Privacypolicy(){
    $policy = Policy_site::first();
    return view('frontend.Pages.Privacypolicy',compact('policy'));
   }
   public function Condition(){
    $condition = Condition_site::first();
    return view('frontend.Pages.Terms',compact('condition')); 
   }
   public function AboutUs(){
    $about = AboutUs::first();
    return view('frontend.Pages.About',compact('about')); 
   }
}
