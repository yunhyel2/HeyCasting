<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{

    public function index()
    {
        if( request()->segment(1) == 'enter-join' ) { 
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

    public function store(Request $request) 
    {
        // $link = $request->input('link'); // 앱로그인, 카카오톡, 페이스북, 구글 ... hide로
        $email = $request->input('user-email'); // 앱 연동일 경우 처리 
        $password = $request->input('password');
        $password2 = $request->input('passwordConf');

        $videos = $request->input('videos'); //배열 
        $main_image = $request->file('main-profile');
        $images = $request->file('photos'); //배열 

        $name = $request->input('user-name');
        $phone = $request->input('user-phone');
        $job = $request->input('user-job');
        $job2 = $request->input('user-job2');
        $job3 = $request->input('user-job3');
        
        $team_name = $request->input('team-name');
        $gender = $request->input('gender');
        $team = $request->input('isTeam');
        $age = $request->input('user-age'); //db에 추가! 
        $performs = $request->input('career'); //배열 
        $cost = $request->input('casting-cost');
        $cost_flag = $request->input('cost-secret'); //value = "on"
        $intro = $request->input('user-intro');

        $intro_detail = $request->input('intro');
        $spec1 = $request->input('spec-intro1[]');
        $spec2 = $request->input('spec-intro2[]');
        $spec3 = $request->input('spec-intro3[]');

        $sns_instagram = $request->input('social_instagram');
        $sns_facebook = $request->input('social_facebook');
        $sns_twitter = $request->input('social_twitter');
        $sns_kakao = $request->input('social_kakao');        

        // Storage::delete('uploads/aa0fe711.png');

        if( $password != $password2 ) {
            return back();
        } else {

            // DB::beginTransaction();

            // try {

                $entertainer = new Enter;
                $entertainer->flag = 'E';
                $entertainer->link = 'A'; //App에서 등록한 경우 
                // $entertainer->link = $link;
                $entertainer->password = bcrypt($password);
                $entertainer->email = $email; 
                $entertainer->name = $name;
                $entertainer->nickname = $name; // 다음에 변경가능하도록! 
                $entertainer->nation = 'KR'; 
                $entertainer->gukgi = 2130837906; 
                $entertainer->code = 82; 
                $entertainer->phone = $phone;
                $entertainer->image = '';
                $entertainer->save();

                $enter_id = Enter::where('email', $email)->first()->id;

                if( $job2 ) {
                    $enter_job = new Enter_job;
                    $enter_job->enter_id = $enter_id;
                    $job_id = Job::where('job', $job)->first()->id;
                    $enter_job->job_id = $job_id;
                    $enter_job->category_id = Job_genre::where('job_id', $job_id)->where('category', $job2)->first()->id;
                    // $enter_job->category_id = 1;
                    $enter_job->save();
                }

                if( $job3 ) {
                    $enter_job = new Enter_job;
                    $enter_job->enter_id = $enter_id;
                    $job_id = Job::where('job', $job)->first()->id;
                    $enter_job->job_id = $job_id;
                    $enter_job->category_id = Job_genre::where('job_id', $job_id)->where('category', $job3)->first()->id;
                    // $enter_job->category_id = 1;
                    $enter_job->save();
                }
                
                foreach( $performs as $perform ) {
                    $enter_perform = new Enter_perform;
                    $enter_perform->enter_id = $enter_id;
                    $category_id = Perform_category::where('category', $perform)->first()->id;
                    // $enter_perform->perform_id = $perform;
                    $enter_perform->category_id = $category_id;
                    $enter_perform->save();
                }
                
                $profile = new Enter_profile;
                $profile->enter_id = $enter_id;
                $profile->name = $team_name; //활동명 예명 팀명 입력 
                // $profile->howmany = Job_howmany::where('job_id', $job)->where('num', $howmany)->first()->id;
                
                $profile->gender = $gender;
                if( $team == 'no-team' ) {
                    $profile->team = 0;
                } else {
                    $profile->team = 1;
                }
                $profile->howmany = 0;
                $profile->age = $age;
                $profile->intro = $intro;
                $replace = array("\'", "\\", "\"");
                $intro_detail = str_replace( $replace, '`', $intro_detail);
                // $career = str_replace( $replace, '`', $career);
                // $recent_perform = str_replace( $replace, '`', $recent_perform);
                $intro_detail = str_replace('<br />', '<br>', nl2br($intro_detail));
                // $career = str_replace('<br />', '<br>', nl2br($career));
                // $recent_perform = str_replace('<br />', '<br>', nl2br($recent_perform));

                $profile->intro_detail = $intro_detail;
                $spec = '';
                for( $i=0; $i<3; $i++ ) {
                    if( $spec1[$i] ) {
                        if( $i == 0 ) {
                            $spec = $spec1[$i] . ' ' . $spec2[$i] . ' ' . $spec3[$i];
                        } else {
                            $spec = $spec . '<br>' . $spec1[$i] . ' ' . $spec2[$i] . ' ' . $spec3[$i];
                        }
                    }
                }
                $profile->recent_perform = '';
                $profile->career = $spec; 
                $profile->contact = $phone;
                $profile->perform_hour = 0; 
                $profile->perform_minutes = 0;
                $profile->address = '';
                $profile->region = ''; //안쓰는 column/
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
                if( $cost_flag == 'on' ) { 
                    $profile->cost_flag = 'N';
                } else {
                    $profile->cost_flag = 'Y';
                }
                $profile->sns_instagram = $sns_instagram;
                $profile->sns_facebook = $sns_facebook;
                $profile->sns_twitter = $sns_twitter;
                $profile->sns_kakao = $sns_kakao;
                $profile->count = 0;
                $profile->bookmark_cnt = 0;
                $profile->engchal_cnt = 0;
                $profile->save();

                $profile_main_image = new Enter_main_image;
                $profile_main_image->enter_id = $enter_id;
                $profile_main_image->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $main_image, 'public');
                $profile_main_image->save();

                foreach( $images as $image ) {
                    $profile_image = new Enter_image;
                    $profile_image->enter_id = $enter_id;
                    $profile_image->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $image, 'public');
                    $profile_image->save();
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
                $user_key->email = $email;
                $user_key->session_id = Str::random(15);
                $user_key->device_id = 0;
                $user_key->push_state = 'Y';
                $user_key->save();

                // DB::commit();
                return redirect('/');

            // } catch(\Exception $e) {
            //     DB::rollback();
            //     return back();
            // }
        }

        
    }

}
