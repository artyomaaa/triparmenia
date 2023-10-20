@extends('site.layout')
@section('title', 'register-account')
@section('content')

    <div class="sign_up_landing">
        <div class="container-fluid">
            <h1>Create a new acount</h1>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    {{--                <div class="dropdown">--}}
                    {{--                    <p>TOURIST GUIDE<span class="glyphicon glyphicon-chevron-down"></span></p>--}}
                    {{--                    <div class="dropdown_content">--}}
                    {{--                        <ul style="text-align: center;">--}}
                    {{--                            <li><a href="">TOURIST GUIDE</a></li>--}}
                    {{--                            <li><a href="">DRIVER</a></li>--}}
                    {{--                            <li><a href="">TOURIST</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}


                    <form id="reg_form">
                        @if(isset($role) && is_object($role))
                            <div style="text-align: center;">
                                <select name="role_id" data-placeholder="Choose&hellip;">
                                    @foreach($role as $roles)
                                        <option value="{{$roles->id}}">{{$roles->role}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                        <br><br>
                        <div class="forms" style="border: none">
                            <div class="header_forms_input">
                                <input autocomplete="on" value="" type="text" name="first_name"
                                       placeholder="First Name">
                                <input type="text" name="last_name" placeholder="Last Name">
                                <span class="error  first_name-error"></span>
                                <span class="error last_name-error"></span>

                            </div>
                            <div class="forms_input">
                                <input type="text" name="user_name" placeholder="Username">
                                <span class="error  user_name-error"></span>
                                <input type="email" name="email" placeholder="Email Address ">
                                <span class="error  email-error"></span>
                                <input id="password" type="password" name="password" placeholder="Password">
                                <span class="error  password_confirmation-error"></span>

                                <input id="conf_password" type="password" name="password_confirmation"
                                       placeholder="Confirm Password">

                                <span class="error  password-error"></span>
                                <input type="file" name="image">
                                <span class="error image-error"></span>
                                <input type="hidden" name="verificate" value="0">

                            </div>
                        </div>
                        <div class="button">
                            <p style="text-align: center;">By tapping 'Sign Up' you agree to our<a>terms &
                                    conditions</a>
                            </p>
                        </div>

                        <div class="sign">
                            <button class="btn_signup">Sign Up</button>
                        </div>
                        <div class="sign">
                            <button class="btn_facebook">sign up with facebook</button>
                        </div>
                        <div class="button">
                            <p class="p" style="text-align: center">already have an account?
                                <span> Login </span>
                            </p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

