<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\StatusCode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Session;

class AdminController extends Controller
{

    public function login_admin(Request $request)
    {
//        dd(1234);
        if (Auth::check()) {
            return redirect('/admin/dashboard/');
        }

        if ($request->isMethod('post')) {


            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:5|max:20',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $this->_response_body($validator->messages(), StatusCode::HTTP_UNPROCESSABLE_ENTITY, 'Validation error');
            }

            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password,
                'role_id' => 4,
            ])) {
                $user = Auth::user();

                return $this->_response_body($user, StatusCode::HTTP_OK);
            }

            $incorrect = ['password' => ["Incorrect email or password."]];
            return $this->_response_body($incorrect, StatusCode::HTTP_BAD_REQUEST, StatusCode::CUSTOM_INCORRECT_EMAIL_OR_PASSWORD);
        }


        return view('auth.login');

    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
