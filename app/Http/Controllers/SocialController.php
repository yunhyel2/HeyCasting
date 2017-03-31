<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToNaver() {
        return Socialite::with('naver')->redirect();
    }

    public function callbackNaver() {
        $link = 'N';
        $user = Socialite::with('naver')->user();
        $user_email = $user->getEmail();
        $userToJoin = Enter::where([
            'link' => 'N',
            'email' => $user_email,
        ])->first();
        
        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-social-join')->with('user-email', $user_email)->with('link', $link);
        } else {
            //이미 가입된 아이디입니다. 자동 로그인
            // \Auth::login($userToJoin); 
            return redirect('/login');
        }
    }

    public function redirectToKakao() {
        return Socialite::with('kakao')->redirect();
    }

    public function callbackKakao() {
        $link = 'K';
        $user = Socialite::with('kakao')->user();
        $user_email = $user->getEmail();
        $userToJoin = Enter::where([
            'link' => 'K',
            'email' => $user_email,
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-social-join')->with('user-email', $user_email)->with('link', $link);
        } else {
            //이미 가입된 아이디입니다. 자동 로그인 
            // \Auth::login($userToJoin); 
            return redirect('/login');
            
        }
    }

    public function redirectToFacebook() {
        return Socialite::with('facebook')->redirect();
    }

    public function callbackFacebook() {
        $link = 'F';
        $user = Socialite::with('facebook')->user();
        $user_email = $user->getEmail();
        $userToJoin = Enter::where([
            'link' => 'F',
            'email' => $user_email,
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-social-join')->with('user-email', $user_email)->with('link', $link);
        } else {
            //이미 가입된 아이디입니다. 자동 로그인 
            // \Auth::login($userToJoin); 
            return redirect('/login');
            
        }
    }

    public function redirectToGoogle() {
        return Socialite::with('google')->redirect();
    }

    public function callbackGoogle() {
        $link = 'G';
        $user = Socialite::with('google')->user();
        $user_email = $user->getEmail();
        $userToJoin = Enter::where([
            'link' => 'G',
            'email' => $user_email,
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-social-join')->with('user-email', $user_email)->with('link', $link);
        } else {
            //이미 가입된 아이디입니다. 자동 로그인 
            // \Auth::login($userToJoin); 
            return redirect('/login');
            
        }
    }
}
