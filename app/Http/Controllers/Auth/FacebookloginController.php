<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class FacebookloginController extends Controller
{
    public function redirectToFacebook()
    {
    return Socialite::driver('facebook')->redirect();
    }
    /**
    * Return a callback method from facebook api.
    *
    * @return callback URL from facebook
    */
    public function handleFacebookCallback()
    {
      $userSocial = Socialite::driver('facebook')->user();
      //return $userSocial;
      $finduser = User::where('user_social_id', $userSocial->id)->first();
      if($finduser){
          Auth::login($finduser);
          return Redirect::to('/facebookpage');
      }else{
      $new_user = User::create([
            'name'      => $userSocial->name,
            'email'      => $userSocial->email,
            'user_photo'  => $userSocial->avatar_original,
            'user_social_id'=> $userSocial->id
        ]);
        Auth::login($new_user);
        return redirect()->back();
    }
  }
}
