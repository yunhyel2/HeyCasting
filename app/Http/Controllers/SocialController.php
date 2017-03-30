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
        $userToJoin = Enter::where([
            'link' => 'N',
            'email' => $user->getId(),
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-join')->with('user', $user)->with('link', $link);
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
        $userToJoin = Enter::where([
            'link' => 'K',
            'email' => $user->getId(),
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-join')->with('user', $user)->with('link', $link);
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
        $userToJoin = Enter::where([
            'link' => 'F',
            'email' => $user->getId(),
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-join')->with('user', $user)->with('link', $link);
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
        $userToJoin = Enter::where([
            'link' => 'G',
            'email' => $user->getId(),
        ])->first();

        // 앱에 가입되지 않은 아이디라면! 
        if(!$userToJoin) {
            return redirect('/enter-join')->with('user', $user)->with('link', $link);
        } else {
            //이미 가입된 아이디입니다. 자동 로그인 
            // \Auth::login($userToJoin); 
            return redirect('/login');
            
        }
    }
}
