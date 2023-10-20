@extends('site.layout')
@section('title', 'Triparmenia')
@section('content')

    <div class="image_section">
        <div class="image_content">
            <div class="content_text">
                <h2>bringing Athletes, fans and sponsors together</h2>
                <div class="content_btns">
                    <div>
                        <button class="what_is_btn">What is
                            <span class="brand">TRIPARMENIA</span>
                        </button>
                    </div>
                    <div>
                        <a href="{{url('/register-user')}}">
                            <button class="sign_up_btn">sign up</button>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid" id="sec_2">
        <div class="row">
            <div class="col-md-12">
                <div class="sec_2_text">
                    <div style="text-align: center; margin-top: 100px;">
                        <h1>WELCOME TO TRIPARMENIA</h1>
                        <br>
                        <p>A platform that brings guides,drivers and tourists together to help</p>
                    </div>
                    <br>
                    <br>


                    <div class="sign_up_div">
                        <a href="{{url('/register-user')}}">
                            <button class="sign_up">SIGN UP</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->


    {{--end modal--}}


    <div class="container" id="sec_3">
        <div class="sec_3_text">
            <h2>Meet some people already using<span>TRIPARMENIA</span></h2>
        </div>

        <div id="carousel-example" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-wrapper">
                                <img src="{{asset('assets/images/Sport.jpg')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="carousel-captions">
                                <h2>WANESA LOW</h2>
                                <p style="color: black">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Consequatur, laboriosam
                                    mollitia, excepturi ad assumenda impedit commodi dolore nulla adipisci est
                                    ratione
                                    incidunt doloribus, nesciunt minus deserunt facere fugit!.
                                    <br><br><br>

                                    <a href="">Reade more<span class="glyphicon glyphicon-menu-right"
                                                               aria-hidden="true"></span></a>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-wrapper">
                                <img src="{{asset('assets/images/Sport.jpg')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="carousel-captions">
                                <h2>WANESA LOW</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                    voluptatibus
                                    voluptatem dolore repudiandae rem vel saepe illum error totam. Tenetur suscipit,
                                    magnam
                                    odio magni ab nam mollitia velit dolores laborum. Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Asperiores porro, sapiente, explicabo distinctio
                                    <br><br><br>
                                    <a href="">Reade more<span class="glyphicon glyphicon-menu-right"
                                                               aria-hidden="true"></span></a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-wrapper">
                                <img src="{{asset('assets/images/Acbrexoni.jpg')}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="carousel-captions">
                                <h2>WANESA LOW</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae optio expedita
                                    asperiores nesciunt cum nisi, eveniet atque quis minus vero quas magni assumenda
                                    deserunt, sint obcaecati, ea cupiditate. Voluptatibus, labore. Lorem ipsum dolor
                                    sit
                                    amet, consectetur adipisicing elit. Dolores ratione doloribus, id provident hic.
                                    Dolorum
                                    ratione suscipit enim minus repellat. Alias iure aperiam cum nulla aut molestias
                                    blanditiis explicabo reprehenderit.
                                    <br><br><br>
                                    <a href="">Reade more<span class="glyphicon glyphicon-menu-right"
                                                               aria-hidden="true"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>

            </a>
            <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>

            </a>
        </div>


    </div>


    <div id="sec_4">
        <div class="container-fluid">
            <div class="sec_4_text">
                <h2>Official Partners</h2>
                <p>Check out some of our partners</p>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>

                </div>
                <div class="col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>


                </div>
                <div class="col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>


                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>

                </div>
                <div class=" col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>
                </div>
                <div class=" col-md-4">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('assets/images/Acbrexoni.jpg')}}" alt="...">
                    </a>
                </div>
                <div class="sec_4_btn">
                    <button>VIEW ALL PARTNERS</button>
                </div>

            </div>

        </div>

    </div>

@endsection
