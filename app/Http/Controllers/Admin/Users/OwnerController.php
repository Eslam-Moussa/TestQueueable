<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function IndexOwner(){
        return view('backend.User.Owner.index');
    }
    public function AddNewOwner(){
        return view('backend.User.Owner.add');
    }
}
