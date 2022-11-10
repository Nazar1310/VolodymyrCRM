<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Factory as ValidatonFactory;

class ChangePasswordFormValidation extends FormRequest
{

    public function __construct(ValidatonFactory $factory, Request $request)
    {

        $getId = $request->route()->parameter('user')->id;

        $factory->extend(
            'password_not_matches',

            function ($attribute, $value, $parameters, $validator) {
                return ((Hash::check($value, Auth::user()->password)));
            },
            'passwordNotMatches'
        );
        $factory->extend(
            'password_cannot_same',
            function ($attribute, $value, $parameters, $validator) use ($getId) {
                if (Auth::user()->role == 'ADMIN' && Auth::user()->id !== $getId) {
                    return true;
                }
                return (!strcmp($value, $this->input('old_password')) == 0);
            },
            'passwordCannotSame'
        );
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'bail|required|password_not_matches',
            'new_password' => 'bail|required|confirmed|string|min:6|password_cannot_same',
            'new_password_confirmation' => 'required|string|min:6'
        ];
    }
}
