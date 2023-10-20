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
    {{--    Modal--}}
    <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="text-align: center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 style="text-align: center;">Are you sure..? to LOG OUT</h3>

                </div>
                {{--            <div class="modal-body">--}}
                {{--                ...--}}
                {{--            </div>--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <a href="{{url('/logout')}}">
                        <button type="button" class="btn btn-primary"> Log out</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

<br><br>
<div id="root" style="padding-top: 20px;">
    <div class="mm-popup">
        <div role="presentation" class="mm-popup__overlay"></div>
    </div>

    <div class="public_profile">
        <div class="column_left">
            <div class="loadedContent"><img src="{{asset('assets/images/sport.jpg')}}"
                                            style="width: 100vh;height: 100vh">
            </div>
        </div>
        <div class="column_right">
            <div class="logo_image"><a class="active" aria-current="page" href="/">
                    <img src="{{asset('assets/images/logo.png')}}" style="width: 20px;">
                </a>
            </div>
            <div class="title"><h4> Based in TripArmenia</h4></div>
            <div class="full_name"><h2>User Name</h2></div>
            <div class="description"><p>test-test-test-test-test-</p></div>
            <div class="support_button_box">
                <button>Support Me</button>
            </div>
            <div class="copyright_box"><p>Copyright TripArmenia 2019</p></div>
        </div>
    </div>
</div>
</body>
</html>