<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery; 
class GalleryController extends Controller
{
    public function GetGallery(){
        $Gallery = Gallery::where('delete_from_table',0)->where('gallery_active',1)->get();
        return view('frontend.Gallery.index',compact('Gallery'));
    }
}
