<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@if(isset($users))
            {{$users->first_name}} {{$users->last_name }}
        @endif</title>
    <link rel="stylesheet" href="{{asset('assets/about_driver/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/about_driver/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/about_driver/main.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
@if(isset($users) && is_object($users))
    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" style="height:600px;width: 800px"
                                 src="{{asset('assets/images/users/'.$users->image)}}" alt="">
                            <div class="top-wrapper ">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                        A Discount Toner Cartridge Is Better Than Ever
                                    </h2>
                                    <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                        <div class="desc">
                                            <h2>{{$users->first_name}} {{$users->last_name}}</h2>
                                            <h3>
                                                <span>{{$users->created_at->format('M')}}</span>
                                                <span class="month">{{$users->created_at->format('d')}}.</span>
                                                <span class="month">{{$users->created_at->format('Y')}}  </span>
                                                <span class="month">{{$users->created_at->format('h')}} : </span>
                                                <span class="month">{{$users->created_at->format('s')}}</span>
                                            </h3>
                                        </div>
                                        <div class="user-img">
                                            <img src="{{asset('assets/images/users/'.$users->image)}}"
                                                 style="width: 60px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Start comment-sec Area -->
                            @if(isset($users->comments))
                                <section class="comment-sec-area pt-80 pb-80">
                                    <div class="container">

                                        <div class="row flex-column" id="comments">
                                            <h5 class="text-uppercase pb-80"
                                                id="comments_count">{{$users->comments->count()}} Comments</h5>
                                            <br>
                                            @foreach($users->comments as $comments)
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">

                                                                <div class="thumb">
                                                                    <img src="{{asset('assets/images/users/'.$comments->picture)}}"
                                                                         style="width:40px" alt="">
                                                                </div>


                                                            <div class="desc">
                                                                <h5>
                                                                    <a href="#">{{$comments->first_name.' '. $comments->last_name}}</a>
                                                                </h5>
                                                                <p class="date">{{$comments->created_at->format('M')}}
                                                                    {{$comments->created_at->format('d')}}
                                                                    {{$comments->created_at->format('Y')}}
                                                                    {{$comments->created_at->format('h')}} :
                                                                    {{$comments->created_at->format('s')}} pm
                                                                </p>
                                                                <p class="comment">
                                                                    {{$comments->message}}
                                                                </p>

                                                            </div>


                                                            @if($user = Auth::user())

                                                                <div class="reply-btn">
                                                                    <a href="{{url('/replay',$comments->id)}}"
                                                                       class="btn-reply text-uppercase">reply</a>
                                                                </div>

                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                                <!-- End comment-sec Area -->
                            @endif

                            @if($user = Auth::user())
                            <!-- Start commentform Area -->
                                <section class="commentform-area  pb-120 pt-80 mb-100">
                                    <div class="container">
                                        <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                        <form id="comment_form">

                                            <div class="row flex-row d-flex">
                                                <div class="col-lg-6">
                                                    <input name="first_name" type="hidden"
                                                           value="{{$user->first_name}}">
                                                    <input name="last_name" type="hidden"
                                                           value="{{$user->first_name}}">
                                                    <input name="email" type="hidden" value="{{$user->email}}">
                                                    <input type="hidden" name="picture" value="{{$user->image}}">
                                                    <input name="subject" placeholder="Subject"
                                                           onfocus="this.placeholder = ''"
                                                           onblur="this.placeholder = 'Enter your Subject'"
                                                           class="common-input mb-20 form-control" required=""
                                                           type="text">
                                                    <input type="hidden" name="user_id" value="{{$users->id}}">

                                                </div>
                                                <div class="col-lg-6">
                                        <textarea class="form-control mb-10" name="message" placeholder="Messege"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                                  required="">

                                        </textarea>
                                                    <input type="button" class="primary-btn mt-20" id="comment_btn"
                                                           value="Comment">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                                <!-- End commentform Area -->
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-area ">


                        <div class="single_widget about_widget" style="text-align: center">
                            <img src="{{asset('assets/images/users/'.$users->image)}}"
                                 style="width: 130px;height: 150px" alt="">
                            <h2 class="text-uppercase">{{$users->user_name}}</h2>
                            @if(isset($users->services))
                                <p>
                                    <i class="fa fa-birthday-cake"></i><span>date:</span>
                                    {{$users->services->date}}

                                </p>
                                <p>
                                    <i class="fa fa-phone"></i><span>phone:</span>
                                    {{$users->services->phone}}

                                </p>
                                <p>
                                    <i class="fa fa-address-book"></i><span>adress:</span>
                                    {{$users->services->adress}}

                                </p>
                                <p>
                                    <i class="fa fa-language"></i><span>language:</span>
                                    {{$users->services->language}}

                                </p>

                            @endif
                            <div class="social-link">
                                <a href="#">
                                    <button class="btn"><i class="fa fa-facebook" aria-hidden="true"></i> Like</button>
                                </a>
                                <a href="#">
                                    <button class="btn"><i class="fa fa-twitter" aria-hidden="true"></i> follow</button>
                                </a>
                            </div>
                        </div>

                        @if(isset($services) && is_object($services))
                            <div class="single_widget recent_widget">
                                <h4 class="text-uppercase pb-20">Recent Posts</h4>


                                <div class="active-recent-carusel">
                                    @foreach($services as $service)
                                        <div class="item">
                                            <img src="{{asset('assets/images/service/'.$service->service_image)}}"
                                                 alt="">
                                            <p class="mt-20 title text-uppercase">text text text <br>
                                                For Everyone</p>
                                            <p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span></p>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- End post Area -->
    </div>
@endif
<!-- End post Area -->

<!-- start footer Area -->

<!-- End footer Area -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}

<script src="{{asset('assets/js/about_driver/js/vendor/jquery-2.2.4.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/about_driver/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/about_driver/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/js/about_driver/js/parallax.min.js')}}"></script>
<script src="{{asset('assets/js/about_driver/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/about_driver/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/about_driver/js/jquery.sticky.js')}}"></script>

<script src="{{asset('assets/js/about_driver/js/main.js')}}"></script>
</body>
</html>