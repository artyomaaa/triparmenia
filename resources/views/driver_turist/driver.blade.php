@extends('site.layout')
@section('title', 'register-account')
@section('content')
    @if(isset($users) && is_object($users))
        <div style="margin-top: 100px">
            <div class="container">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{asset('assets/images/users/'.$user->image)}}" alt="..." style="width: 400px;height: 320px">
                                <div class="caption" style="text-align: center">
                                    <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                                    @if(isset($user->services))
                                        <p>{{$user->services->phone}} </p>
                                        <p>{{$user->services->date}}</p>
                                        <p>{{$user->services->adress}}</p>
                                        <p>{{$user->services->language}}</p>

                                    <p><a href="{{url('about-driver',$user->id)}}" class="btn btn-primary" data-id="{{$user->services->id}}" role="button">learn more</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$users->links()}}
            </div>

        </div>
    @endif
@endsection

