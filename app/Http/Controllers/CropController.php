<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Images;

class CropController extends Controller
{
    //
    public function upload()
    {
        $form_data = Input::all();

        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ($validator->fails()) {

            return Response::json([
                'status' => 'error',
                'message' => $validator->messages()->first(),
            ], 200);

        }

        $photo = $form_data['img'];

        $original_name = $photo->getClientOriginalName();
        $original_name_without_ext = substr($original_name, 0, strlen($original_name) - 4);

        $filename = $this->sanitize($original_name_without_ext);
        $allowed_filename = $this->createUniqueFilename( $filename );

        $filename_ext = $allowed_filename .'.jpg';

        $url = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/' . Storage::disk('s3')->put('main_image', $photo, 'public');

        if( !$url) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }

        $database_image = new Image;
        $database_image->filename      = $allowed_filename;
        $database_image->original_name = $original_name;
        $database_image->crop = $url;
        $database_image->save();
            
        return Response::json([
            'status'    => 'success',
            'url' => $url, 
            'width'     => Images::make($url)->width(),
            'height'    => Images::make($url)->height(),
        ], 200);
    }

    public function crop()
    {
        $form_data = Input::all();
        $image_url = $form_data['imgUrl'];

        // resized sizes
        $imgW = $form_data['imgW'];
        $imgH = $form_data['imgH'];
        // offsets
        $imgY1 = $form_data['imgY1'];
        $imgX1 = $form_data['imgX1'];
        // crop box
        $cropW = $form_data['width'];
        $cropH = $form_data['height'];
        // rotation angle
        $angle = $form_data['rotation'];

        $filename_array = explode('/', $image_url);
        $filename = $filename_array[sizeof($filename_array)-1];

        $image = Images::make( $image_url )
                    ->resize($imgW, $imgH)
                    ->rotate(-$angle)
                    ->crop(1080, 674, $imgX1, $imgY1);
        $image = $image->stream();
        Storage::disk('s3')->delete('main_image/'.$filename);
        Storage::disk('s3')->put('main_image/crop-'.$filename, $image->__toString(), 'public');
        $url = 'https://s3.ap-northeast-2.amazonaws.com/heycasting/main_image/crop-' .$filename; 

        $imageDB = Image::where('crop', $image_url)->first();
        $imageDB->crop = $url;
        $imageDB->save();
            

        if( !$url) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }

        //view crop image 
        return Response::json([
            'status' => 'success',
            'url' => $url
        ], 200);
    }

    private function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }


    private function createUniqueFilename( $filename )
    {
        $upload_path = env('UPLOAD_PATH');
        $full_image_path = $upload_path . $filename . '.jpg';

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $image_token = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $image_token;
        }

        return $filename;
    }

}
