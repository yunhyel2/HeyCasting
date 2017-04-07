<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EnterJoinRequest;
use App\Http\Requests\UserJoinRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Enter_image;
use App\Enter_job;
use App\Enter_key;
use App\Enter_main_image;
use App\Enter_perform;
use App\Enter_profile_video;
use App\Enter_profile;
use App\Enter;
use App\Job;
use App\Job_genre;
use App\Job_howmany;
use App\Perform_category;
use App\User_key;
use App\User;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{

    public function index()
    {
        if( request()->segment(1) == 'enter-join' || request()->segment(1) == 'enter-social-join' ) { 
            return view('Join.entertainer');
        } else {
            return view('Join.user');
        }
    }

    public function create() 
    {
        return view('Join.create');
    }

    public function joinCheck(Request $request) 
    {
        $email = $_POST['email'];
        $email_count = Enter::where('email', $email)->count();
    
        echo $email_count;
    }

    public function enterStore(EnterJoinRequest $request) 
    {
        $flag = 'E';
        $email = $request->input('user-email'); 
        $f_email = $request->input('facebook_mail');
        $g_email = $request->input('google_mail');
        $k_email = $request->input('kakao_id');
        $n_email = $request->input('naver_mail');

        $password = $request->input('password');
        $password2 = $request->input('passwordConf');

        $videos = $request->input('videos'); 
        $main_image = $request->input('main-profile');
        $images = $request->file('photos'); 

        $name = $request->input('user-name');
        $phone = $request->input('user-phone');
        $job = $request->input('user-job');
        $job2 = $request->input('user-job2');
        $job3 = $request->input('user-job3');
        
        $team_name = $request->input('team-name');
        $gender = $request->input('gender');
        $team = $request->input('isTeam');
        $age = $request->input('user-age');
        $residence = $request->input('location1');
        $nation = $request->input('location2');
        $prefer_area = $request->input('location3'); 
        $performs = $request->input('career'); 
        $cost = $request->input('casting-cost');
        $intro = $request->input('user-intro');

        $intro_detail = $request->input('intro');
        $spec1 = $request->input('spec-intro1');
        $spec2 = $request->input('spec-intro2');
        $spec3 = $request->input('spec-intro3');

        $sns_instagram = $request->input('social_instagram');
        $sns_facebook = $request->input('social_facebook');
        $sns_blog = $request->input('social_blog');
        $sns_twitter = $request->input('social_twitter');      
        $sns_youtube = $request->input('social_youtube'); 

        if( $email ) {
            $link = 'A';
            $user_email = $email;
            if( $password != $password2 ) {
                return back();
            }
        } else if ( $f_email ) {
            $link = 'F';
            $user_email = $f_email;
        } else if ( $n_email ) {
            $link = 'N';
            $user_email = $n_email;
        } else if ( $k_email ) {
            $link = 'K';
            $user_email = $k_email;
        } else if ( $g_email ) {
            $link = 'G';
            $user_email = $g_email;
        }

        //이미 존재하는 회원일 경우! 
        $exist_user = Enter::where('link', $link)->where('email', $user_email)->count();
        if( $exist_user != 0 ) {
            return back();
        }


        DB::beginTransaction();

        try {

            $entertainer = new Enter;
            $entertainer->flag = $flag;
            $entertainer->link = $link; 
            $entertainer->email = $user_email;

            if( $email ) {
                $entertainer->password = bcrypt($password); 
            } else {
                $entertainer->password = '';
            } 
            
            $entertainer->name = $name;
            $entertainer->nickname = $name;
            $entertainer->nation = $nation; 
            $entertainer->gukgi = 2130837906; 
            $entertainer->code = 82; 
            $entertainer->phone = $phone;
            $entertainer->image = '';
            $entertainer->save();

            $enter_id = Enter::where('email', $user_email)->first()->id;

            $enter_job = new Enter_job;
            $enter_job->enter_id = $enter_id;
            $job_id = Job::where('job', $job)->first()->id;
            $enter_job->job_id = $job_id;
            $enter_job->category_id = Job_genre::where('job_id', $job_id)->where('category', $job2)->first()->id;
            $enter_job->save();
            

            if( $job3 ) {
                $enter_job = new Enter_job;
                $enter_job->enter_id = $enter_id;
                $job_id = Job::where('job', $job)->first()->id;
                $enter_job->job_id = $job_id;
                $enter_job->category_id = Job_genre::where('job_id', $job_id)->where('category', $job3)->first()->id;
                $enter_job->save();
            }
            if( $performs ){
                foreach( $performs as $perform ) {
                    $enter_perform = new Enter_perform;
                    $enter_perform->enter_id = $enter_id;
                    $category_id = Perform_category::where('id', $perform)->first()->id;
                    $enter_perform->category_id = $category_id;
                    $enter_perform->save();
                }
            }
            
            $profile = new Enter_profile;
            $profile->enter_id = $enter_id;
            $profile->name = $team_name; 
            $profile->gender = $gender;
            $profile->team = $team;
            $profile->prefer_area = $prefer_area;
            $profile->residence = $residence;
            
            $profile->howmany = 0;
            $profile->age = $age;
            $profile->intro = $intro;
            $replace = array("\'", "\\", "\"");
            $intro_detail = str_replace( $replace, '`', $intro_detail);
            $intro_detail = str_replace('<br />', '<br>', nl2br($intro_detail));

            $profile->intro_detail = $intro_detail;
            $spec = '';
            for( $i=0; $i<count($spec1); $i++ ) {
                if( $i == 0 ) {
                    $spec = $spec1[$i] . ' ' . $spec2[$i] . ' ' . $spec3[$i];
                } else {
                    $spec = $spec . '<br>' . $spec1[$i] . ' ' . $spec2[$i] . ' ' . $spec3[$i];
                }
            }
            $profile->recent_perform = '';
            $profile->career = $spec; 
            $profile->contact = $phone;
            $profile->perform_hour = 0; 
            $profile->perform_minutes = 0;
            $profile->address = '';
            $profile->region = ''; 
/*
            $address = explode('(', $address); //괄호 안에 상세주소가 존재할 경우 에러 발생 
            $address = urlencode($address[0]);
            $map = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyAOM1ShbybK3wFn8rdsojUlp0BuwBK_08w');
            $json = json_decode($map, true);
            if( $json['results'] == null ) {
                $profile->latitude = 0;
                $profile->longitude = 0;
            } else {
                $profile->latitude = $json['results'][0]['geometry']['location']['lat'];
                $profile->longitude = $json['results'][0]['geometry']['location']['lng'];
            }
*/
            $profile->latitude = 0;
            $profile->longitude = 0;
            $profile->cost = $cost;

            $profile->cost_flag = 'N';
            if( $sns_instagram ) {
                $profile->sns_instagram = 'https://www.instagram.com/'.$sns_instagram;
            } 
            if( $sns_facebook ) {
                $profile->sns_facebook = 'https://www.facebook.com/'.$sns_facebook;
            }
            if( $sns_blog ) {
                $profile->sns_blog = 'http://blog.naver.com/'.$sns_blog;
            }
            if( $sns_youtube ) {
                $profile->sns_youtube = 'https://www.youtube.com/channel/'.$sns_youtube;
            }
            if( $sns_twitter ) {
                $profile->sns_twitter = 'https://twitter.com/'.$sns_twitter;
            }
            $profile->count = 0;
            $profile->bookmark_cnt = 0;
            $profile->engchal_cnt = 0;
            $profile->save();

            $profile_main_image = new Enter_main_image;
            $profile_main_image->enter_id = $enter_id;
            $profile_main_image->image = $main_image;
            $profile_main_image->save();

            if( $images ) { 
                foreach( $images as $image ) {
                    $profile_image = new Enter_image;
                    $profile_image->enter_id = $enter_id;
                    $profile_image->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $image, 'public');
                    $profile_image->save();
                }
            }
            
            
            foreach( $videos as $video ) {
                $profile_video = new Enter_profile_video;
                $profile_video->enter_id = $enter_id;
                $profile_video->video = $video;
                if( strpos( $video, 'www.youtube.com') ) {
                    $parse = strstr($video, 'watch?v=');
                    $profile_video->thumbnail = 'https://img.youtube.com/vi/' . $parse . '/0.jpg';
                } else if( strpos( $video, 'youtu.be') ) {
                    $parse = strstr($video, 'youtu.be/');
                    $profile_video->thumbnail = 'https://img.youtube.com/vi/' . $parse . '/0.jpg';
                } else {
                    $profile_video->thumbnail = 'https://img.youtube.com/vi//0.jpg';
                }
                $profile_video->save();
            }

            $user_key = new User_key;
            $user_key->email = $user_email;
            $user_key->session_id = Str::random(15);
            $user_key->device_id = 0;
            $user_key->push_state = 'Y';
            $user_key->save();
            DB::commit();

        } catch(\Exception $e) {
            DB::rollback();
            return redirect('/');
        }
        return redirect('/complete/enter');
        
    }

    public function userStore(UserJoinRequest $request) 
    {
        $flag = 'N';
        $link = $request->input('link'); 
        $email = $request->input('user-email'); 
        $password = $request->input('password');
        $password2 = $request->input('passwordConf');
        $name = $request->input('user_name');
        $phone = $request->input('user_phone');

        if( $password != $password2 ) {
            return back();
        } else {

            DB::beginTransaction();

            try {
                $user = new User;
                $user->flag = $flag;
                if( $link ) {
                    $user->link = $link;
                } else {
                    $user->link = 'A';
                }
                
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->name = $name;
                $user->nickname = $name;
                $user->nation = 'KR';
                $user->gukgi = 2130837906; 
                $user->code = 82; 
                $user->phone = $phone;
                $user->image = '';
                $user->save();

                DB::commit();

            } catch(\Exception $e) {
                DB::rollback();
                return view('/');         
            }
            return redirect('/complete/user');
        }
    }

    public function complete($stat) {
        if( $stat == 'enter' ) {
            $user = '엔터테이너';    
        } else {
            $user = '일반';
        }
        return view('Join.complete')->with('user', $user);
    }
}
