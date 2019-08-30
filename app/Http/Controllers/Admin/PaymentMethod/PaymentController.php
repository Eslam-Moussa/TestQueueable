<?php

namespace App\Http\Controllers\Admin\PaymentMethod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function GetPayment(){
        return view('backend.PaymentMethod.index');
    }
    public function AddNewPayment(){
        return view('backend.PaymentMethod.add');
    }
}
