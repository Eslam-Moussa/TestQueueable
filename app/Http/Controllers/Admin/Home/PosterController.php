<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poster_site;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class PosterController extends Controller
{
    public function GetPoster(Request $request) {
        if ($request->isMethod('post')) {
            try {
                $poster = new Poster_site();
                $poster->title1_poster = $request->input('title1_poster');
                $poster->link1_poster = $request->input('link1_poster');
                $poster->desc1_poster = $request->input('desc1_poster');

                $poster->title2_poster = $request->input('title2_poster');
                $poster->link2_poster = $request->input('link2_poster');
                $poster->desc2_poster = $request->input('desc2_poster');

                $poster->title3_poster = $request->input('title3_poster');
                $poster->link3_poster = $request->input('link3_poster');
                $poster->desc3_poster = $request->input('desc3_poster');

                $poster->title4_poster = $request->input('title4_poster');
                $poster->link4_poster = $request->input('link4_poster');
                $poster->desc4_poster = $request->input('desc4_poster');


                if (Input::hasFile('image1_poster')) {
                    $file = Input::file('image1_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image1_poster = $path . $filename;
                }
                if (Input::hasFile('image2_poster')) {
                    $file = Input::file('image2_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image2_poster = $path . $filename;
                }

                if (Input::hasFile('image3_poster')) {
                    $file = Input::file('image3_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image3_poster = $path . $filename;
                }

                if (Input::hasFile('image4_poster')) {
                    $file = Input::file('image4_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image4_poster = $path . $filename;
                } 

                $poster->save();

                Session::flash('success', 'تم التعديل بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم التعديل');
                return Redirect::back();
            }
        }
        $poster = Poster_site::first();
        return view('backend.Poster.post', compact('poster'));
    }

    public function EditPoster(Request $request) {
        if ($request->isMethod('post')) {
            try {
                $poster = Poster_site::first();
                $poster->title1_poster = $request->input('title1_poster');
                $poster->link1_poster = $request->input('link1_poster');
                $poster->desc1_poster = $request->input('desc1_poster');

                $poster->title2_poster = $request->input('title2_poster');
                $poster->link2_poster = $request->input('link2_poster');
                $poster->desc2_poster = $request->input('desc2_poster');

                $poster->title3_poster = $request->input('title3_poster');
                $poster->link3_poster = $request->input('link3_poster');
                $poster->desc3_poster = $request->input('desc3_poster');

                $poster->title4_poster = $request->input('title4_poster');
                $poster->link4_poster = $request->input('link4_poster');
                $poster->desc4_poster = $request->input('desc4_poster');


                if (Input::hasFile('image1_poster')) {
                    $file = Input::file('image1_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image1_poster = $path . $filename;
                }
                if (Input::hasFile('image2_poster')) {
                    $file = Input::file('image2_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image2_poster = $path . $filename;
                }

                if (Input::hasFile('image3_poster')) {
                    $file = Input::file('image3_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image3_poster = $path . $filename;
                }

                if (Input::hasFile('image4_poster')) {
                    $file = Input::file('image4_poster');
                    $path = 'poster/';
                    $filename = time() . '.' . $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $poster->image4_poster = $path . $filename;
                }

                $poster->save();

                Session::flash('success', 'تم التعديل بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم التعديل');
                return Redirect::back();
            }
        }
    }
}
 