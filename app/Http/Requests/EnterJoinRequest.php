<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterJoinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user-email' =>'required|email|unique:user_enter',
            'password' =>'required',
            'passwordConf' =>'required',
            'videos[]' =>'required',
            'main-profile' =>'required',
            'user-name' =>'required',
            'user-phone' =>'required',
            'user-job' =>'required',
            'user-job2' =>'required',
            'team-name' =>'required',
            'gender' =>'required',
            'isTeam' =>'required',
            'user-age' =>'required',
            'user-intro' =>'required',
        ];
    }
}
