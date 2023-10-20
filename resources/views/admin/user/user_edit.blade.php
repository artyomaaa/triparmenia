@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(isset($user) && is_object($user))
                    <form action="" id="admin_user">

                        <div class="input_header">
                            <h1>CHANGE USER</h1>
                            <div class="input_first">
                                <input type="text" name="first_name" value="{{$user->first_name}}">

                            </div>
                            <div class="input_first">
                                <input type="text" name="last_name" value="{{$user->last_name}}">
                            </div>
                            <div class="second_input">
                                <input type="text" name="user_name" value="{{$user->user_name}}">

                            </div>

                            <div class="second_input">
                                <input type="email" name="email" value="{{$user->email}}">
                            </div>
                            <br><br>
                            <div>
                                <input type="file" name="new_image">
                                <img src="{{asset('assets/images/users/'.$user->image)}}" style="width: 80px; height: 80px">

                            </div>
                            <br>
                            <div class="second_input" style="font-size: 30px;">
                                <a href="" class="btn">
                                    <input type="submit" value="Change"
                                           style="background-color: green;color: white;cursor: pointer" id="change">
                                </a>
                            </div>

                        </div>

                    </form>
                @endif
            </div>

        </div>

    </div>

@endsection