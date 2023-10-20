<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/site.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/register_form.css')}}">

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
            <a class="navbar-brand" href="{{env('APP_URL')}}">
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
                            <li><a href="{{route('driver')}}">DRIVERS</a></li>
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
                <li class="sign_in" data-toggle="modal" data-target="#myModal2">
                    <a href="#">SIGN IN</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>

@yield('content')


<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class=" modal-header" style="border: none">
                <span class="close pull-left" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <br>
                <br>
                <h1 style="text-align: center;font-weight: 700;color: #34495e;text-transform: uppercase;font-size: 25px;">
                    Sign in</h1>
            </div>


            <div class="modal-body">
                <div class="row">

                    <form action="" method="post" id="modal_login_forms">
                        <span class="error  incorrect-error"></span>
                        <span class="error  verificate-error"></span>
                        <div class="input_login">
                            <div class="col-md-4">
                                <input class="input" type="email" name="email" placeholder="*Email adress">
                                <span class="error  email-error"></span>
                            </div>
                            <div class="col-md-4">
                                <input type="password" class="input" name="password" placeholder="*Password">
                                <span class="error  password-error"></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <input class="btn_sign-in" type="button" name="save" value="Sign in">
                            <span class=""></span>
                        </div>


                    </form>

                </div>

                <div class="row" style="margin: 10px auto">
                    <div class="col-xs-6">
                        <input type="checkbox" class="filled-in" checked="checked" style="width:21px;height:21px;">

                        <span style="margin: 20px auto;width: 100%;">Remember me</span>

                    </div>
                    <div class="col-xs-6">
                        <a href="{{url('check-password')}}">
                            <button style="border: none;background: none;">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                Forgot Log in details?
                            </button>
                        </a>
                    </div>
                </div>

                <div class="row" style="margin: 30px auto">


                    <div style="width: 100%;height: 200px;background-color: #34495e;color: white;font-weight: bold;font-family: Lato;">
                        <img src="{{asset('assets/images/logo.png')}}"
                             style="width:30px; margin-left: 50%; margin-top: 50px" alt="">
                        <h3 style="text-align: center; margin-top: -2px">Maximise Energise Optimise</h3>
                    </div>
                    <br><br>
                    <div style="width: 100%;height: 200px;background-color: white;color: #34495e;font-weight: bold;font-family: Lato; font-size: 18px;text-transform: uppercase;">
                        <p style="margin: 10px auto;text-align: center">Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit. Harum, iusto!Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                            Asperiores blanditiis dolore dolorum ex labore mollitia
                            quidem voluptatibus! Accusamus, odit, quaerat?</p>
                    </div>
                </div>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

</body>
</html>