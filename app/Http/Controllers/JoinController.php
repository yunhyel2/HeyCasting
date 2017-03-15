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
use App\Job_genre;
use App\Job_howmany;
use App\Perform_category;

class JoinController extends Controller
{

    public function index()
    {
        return view('Join.index');
    }

    public function create() 
    {
        return view('Join.create');
    }

    public function store(Request $request) 
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password-confirm');
        $name = $request->input('name');
        $nickname = $request->input('nickname');
        $phone = $request->input('phone');
        $enter_name = $request->input('enter_name');
        $job = $request->input('job');
        $categories = $request->input('category');
        $perform = $request->input('perform');
        $howmany = $request->input('howmany');
        $intro = $request->input('intro');
        $address = $request->input('address');
        $perform_minutes = $request->input('perform_minutes');
        $cost = $request->input('cost');
        $cost_flag = $request->input('cost_flag');
        $video = $request->input('video');
        $intro_detail = $request->input('intro_detail');
        $career = $request->input('career');
        $recent_perform = $request->input('recent_perform');
        // $main_image = $request->file('main');
        $images = $request->file('image[]');

        if( $password != $password2 ) {
            return back();
        } else {
            $entertainer = new Enter;
            $entertainer->flag = 'E';
            $entertainer->link = 'A'; //App에서 등록한 경우 
            $entertainer->email = $email; 
            $entertainer->password = bcrypt($password);
            $entertainer->name = $name;
            $entertainer->nickname = $nickname;
            $entertainer->nation = 'KR'; //
            $entertainer->gukgi = 2130837906; //
            $entertainer->code = 82; // 
            $entertainer->phone = $phone;
            // $entertainer->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $main_image, 'public');
            $entertainer->image = '';
            $entertainer->save();

            $enter_id = Enter::where('email', $email)->first()->id;

            foreach ( $categories as $category ) {
                $enter_job = new Enter_job;
                $enter_job->enter_id = $enter_id;
                $enter_job->job_id = $job;
                $enter_job->category_id = Job_genre::where('job_id', $job)->where('num', $category)->first()->id;
                $enter_job->save();
            }

            $enter_perform = new Enter_perform;
            $enter_perform->enter_id = $enter_id;
            $enter_perform->perform_id = $perform;
            $enter_perform->category_id = Perform_category::where('perform_id', $perform)->where('num', 0)->first()->id;
            $enter_perform->save();
   
            $profile = new Enter_profile;
            $profile->enter_id = $enter_id;
            $profile->name = $nickname;
            $profile->howmany = Job_howmany::where('job_id', $job)->where('num', $howmany)->first()->id;
            $profile->intro = $intro;
            $profile->intro_detail = $intro_detail;
            $profile->contact = $phone;
            $profile->perform_hour = 0; 
            $profile->perform_minutes = $perform_minutes;
            $profile->address = $address;
            $profile->region = ''; //안쓰는 column
            $map = 'https://maps.google.com/maps/api/geocode/json?address=' . $address;
            $profile->latitude = 
            $profile->longtitude = 
            $profile->cost = $cost;
            if( $cost_flag == 'checked' ) { 
                $profile->cost_flag = 'N';
            } else {
                $profile->cost_flag = 'Y';
            }
            $profile->career = $career;
            $profile->recent_perform = $recent_perform;
            $profile->count = 0;
            $profile->bookmark_cnt = 0;
            $profile->engchal_cnt = 0;
            $profile->save();

            // $profile_main_image = new Enter_main_image;
            // $profile_main_image->enter_id = $enter_id;
            // $profile_main_image->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $main_image, 'public');
            // $profile_main_image->save();

            // foreach( $images as $image ) {
            //     $profile_image = new Enter_image;
            //     $profile_image->enter_id = $enter_id;
            //     $profile_image->image = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/'.Storage::put('test', $image, 'public');
            //     $profile_image->save();
            // }

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

            $user_key = new User_key;
            $user_key->email = $email;
            $user_key->session_id = Str::random(60);
            $user_key->device_id = 0;
            $user_key->push_state = 'Y';
            $user_key->save();

        }

        return redirect('/');
    }

}
