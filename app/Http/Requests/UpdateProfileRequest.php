<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends Request
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

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'username' => 'required|unique:users,username,'.Auth::user()->id,
            'profileImage' => 'image'
        ];
    }
}
