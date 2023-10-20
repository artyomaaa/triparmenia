<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','check Password')</title>

    {{--    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/site.css')}}">--}}

    {{--    <link rel="stylesheet" href="{{asset('assets/css/register_form.css')}}">--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"--}}
    {{--          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">--}}
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{asset('assets/js/auth.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


</head>
<body>
<div class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1>
                        Check Password..?
                    </h1>

                </div>
                <div class="form-group">
                    <form action="" id="reset_pass">
                        <input type="hidden" value="{{$token}}" name="password_token">
                        <div>
                            <label for="password">password:</label>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Enter your password"
                                       style="height: 65px;width: 350px;padding: 15px">
                            </div>
                            <label for="conf_password">conf_password:</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="conf_password"
                                       placeholder="Enter your conf_password"
                                       style="height: 65px;width: 350px;padding: 15px">
                            </div>
                            <span class="incorrect-error" style="color: red; font-size: 18px"></span>
                            <span class="password-error" style="color: red; font-size: 18px"></span>
                            <div class="form-group">
                                <input type="button" value="check_pass" class="btn btn-info" id="reset_pass_btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>