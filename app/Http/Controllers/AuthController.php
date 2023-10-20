<?php

namespace App\Http\Controllers;

use App\Http\Services\StatusCode;
use App\Mail\CheckPassword;
use App\Mail\VerifiEmail;
use App\Role;
use App\ServiceImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{
    public function reg_user_view()
    {
        if (Auth::check()) {
            return redirect('/my-account');
        }
        $role = Role::where('id', '<=', 3)->get();
        return view('site.create_account', compact('role'));
    }

    public function register_account(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'image' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
//            'password_confirmation' => 'required',


        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(),
                StatusCode::HTTP_UNPROCESSABLE_ENTITY,
                'Validation Error');
        }


        $query = new User();
        $query->role_id = $request->role_id;
        $query->verificate = $request->verificate;
        $query->email = $request->email;
        $query->first_name = $request->first_name;
        $query->last_name = $request->last_name;
        $query->user_name = $request->user_name;
        $query->password = Hash::make($request->password);
        $query->conf_password = Hash::make($request->conf_password);
        $query->remember_token = md5($request->email);

        if ($request->file('image')) {
            $image = $request->image;
            $new_name = time() . '_' . mb_strimwidth($request->first_name, 0, 3) . $image->getclientOriginalname();
            $image->move(public_path('/assets/images/users'), $new_name);
            $query->image = $new_name;
        }

        $query->save();
        $token = md5($request->email);
        Mail::to($request->email)->send(new VerifiEmail($token));
        return $this->_response_body(true);


    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(), StatusCode::HTTP_UNPROCESSABLE_ENTITY, 'Validation error');
        }

        $email = $request->email;

        $password = $request->password;

//        $user = User::query()->where('email', $email)->first();

        if (Auth::attempt(['email' => $email, 'password' => $password, 'verificate' => 1])) {
            return $this->_response_body(true);
        }


        if (Auth::attempt(['email' => $email, 'password' => $password, 'verificate' => 0])) {

            $verificate = ['verificate' => ["Go to your mail page verificate...?"]];

            return $this->_response_body($verificate, StatusCode::HTTP_BAD_REQUEST, StatusCode::CUSTOM_INCORRECT_EMAIL_OR_PASSWORD);
        } else {
            $incorrect = ['incorrect' => ["Incorrect email or password...?"]];
            return $this->_response_body($incorrect, StatusCode::HTTP_BAD_REQUEST, StatusCode::CUSTOM_INCORRECT_EMAIL_OR_PASSWORD);
        }
    }

    public function my_account()
    {

        if (!Auth::check()) {
            return redirect('/register-user');
        }
        $user = Auth::user();

        // dd($user->id);

        if (isset($user->id)) {
            $services = ServiceImage::where('service_id', '=', $user->id)->take(4)->get();
        }
        return view('site.my_account', compact('services'));

    }

    public function verificate($token)
    {
        $query = User::query()->where('remember_token', $token)->first();
        $query->verificate = 1;
        $query->save();
        if ($query) {

            return redirect('/')->with('query', 'you are succsesfully verificate');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function check_password()
    {
        return view('auth.passwords.check_pass');
    }

    public function check_email(Request $request)
    {
        $email = $request->email;
        $query = User::query()->where('email', $email)->first();
        $token = str_random(35);
        if ($query) {
            $query->password_token = $token;
            $query->save();
            Mail::to($request->email)->send(new CheckPassword($token));
            return $this->_response_body(true);
        } else {
            $incorrect = ['incorrect' => ["Incorrect email...!"]];
            return $this->_response_body($incorrect, StatusCode::HTTP_BAD_REQUEST, StatusCode::CUSTOM_INCORRECT_EMAIL_OR_PASSWORD);
        }
    }

    public function check($token)
    {

        return view('auth.passwords.password_reset', compact('token'));

    }

    public function reset_password(Request $request)
    {

        $rules = [
            'password' => 'required|confirmed|min:6',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(),
                StatusCode::HTTP_UNPROCESSABLE_ENTITY,
                'Validation Error');
        }


        $token = $request->password_token;

        $query = User::query()->where('password_token', $token)->first();

        $query->password = Hash::make($request->password);

        $query->conf_password = Hash::make($request->conf_password);

        $query->update();

        return $this->_response_body(true);


    }


}
