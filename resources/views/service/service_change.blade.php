<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/site.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/register_form.css')}}">
    <link rel="stylesheet" href="{{asset("assets/css/my_account.css")}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{asset('assets/js/auth.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


</head>
<body>

<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>

            </button>
            <a class="navbar-brand" href="{{url('http://triparmenia.loc/')}}">
                <span>
                    <img src="{{asset('assets/images/logo.png')}}" style="width:30px" alt="">
                </span> TRIPARMENIA</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="custom_dropdown">
                    <a href="#" class="is_active">HOW IT WORKS</a>
                    <div class="line"></div>
                    <div class="custom_dropdown_content">
                        <ul>
                            <li><a href="">GUIDES</a></li>
                            <li><a href="">DRIVERS</a></li>
                            <li><a href="">GUESTS</a></li>
                        </ul>
                    </div>
                </li>

                <li class="is_active"><a href="#">BLOG</a>
                    <div class="line"></div>
                </li>
                <li class="is_active"><a href="#">VISION</a>
                    <div class="line"></div>
                </li>
                <li class="is_active"><a href="{{url('partners')}}">PARTNERS</a>
                    <div class="line"></div>
                </li>
                @if($user= Auth::user())
                    <li class="sign_in" data-toggle="modal" data-target="#myModal-{{$user->id}}">
                        <a href="#"> LOG OUT</a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
@if($user= Auth::user())


    <div class="sign_up_landing">
        <div class="container-fluid">
            <h1>Change a Service</h1>
            <div class="row">
                <div class="col-xs-6 col-md-12">
                    <form id="chg_form_service" method="post" action="{{route('change_service',$user->services->id)}}">
                        @csrf
                        <div class="forms" style="border: none">
                            <div class="header_forms_input">
                                <input autocomplete="on" value="{{$user->services->date}}" type="text" name="date"
                                       placeholder="Date">
                                <input type="text" name="language" placeholder="language"
                                       value="{{$user->services->language}}">
                                <span class="error  date-error"></span>
                                <span class="error language-error"></span>

                            </div>
                            <div class="forms_input">
                                <input type="text" name="phone" placeholder="phone" value="{{$user->services->phone}}">
                                <span class="error  phone-error"></span>
                                <input type="text" name="adress" placeholder=" Address"
                                       value="{{$user->services->adress}}">
                                <span class="error  adress-error"></span>


                                <input type="text" name="car_model" value="{{$user->services->car_model}}"
                                       placeholder="car_model">
                                <span class="error  car_model-error"></span>
                                <br>
                                <div>
                                    <img src="{{asset('/assets/images/users/'.$user->image)}}"
                                         style="width: 100px;height: 100px;display: inline-block" alt="">
                                    <div style="display: inline-block">
                                        <input type="file" name="new_image">
                                    </div>
                                </div>
                                @if($user= Auth::user())
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                @endif

                            </div>
                        </div>


                        <div class="sign">
                            <input type="submit" class="service_change" id="chg_service" value="Chg_service">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

</body>
</html>