<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bali</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        @include('partials.nav');
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('/storage/' . $destination->image)}}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">{{$destination->title}}</h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="">Home <i class=""></i></a></span> </p> --}}
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-md-last ftco-animate py-md-5 mt-md-5">
                    <h5 class="mb-1">{{$destination->description}}</h5>

                    <p>
                        <img src="images/bali.jpeg" alt="" class="img-fluid">
                    </p>
                    <h5 class="mb-3"><b>Lịch trình chuyến đi</b></h5>
                    <div>
                        {!! $destination->content !!}
                    </div>
                    <li class="nav-item cta"><a href="#" class="nav-link">Đặt ngay</a></li>

                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
                    <div class="sidebar-box pt-md-5">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Tìm kiếm từ khóa">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Danh mục</h3>
                            @foreach ($categories as $category)
                            <div class="col-6">
                                <a href="#">
                                    {{$category->name}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Các địa điểm liên quan khác</h3>
                        @if($destinationOrther)
                        <div class="project-wrap">
                            <a href="#" class="img" style="background-image: url('{{asset('/storage/' . $destinationOrther->image)}}');"></a>
                            <div class="text p-4">
                                <span class="price">${{$destinationOrther->pricing}}/Người</span>
                                {{-- <span class="days">8 Days Tour</span> --}}
                                <h3><a href="#">{{$destinationOrther->title}}</a></h3>
                                {{-- <p class="location"><span class="ion-ios-map"></span> Bali, Indonesia</p> --}}
                                <ul>
                                    <li><span class="flaticon-shower"></span>2</li>
                                    <li><span class="flaticon-king-size"></span>3</li>
                                    {{-- <li><span class="flaticon-sun-umbrella"></span>Near Beach</li> --}}
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                            <div class="col-6">
                                <a href="#">
                                    {{$tag->name}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}


                </div>

            </div>
        </div>
    </section> <!-- .section -->

    <footer class="ftco-footer bg-bottom" style="background-image: url(images/footer-bg.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Vacation</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Categories</h2>
                        @foreach ($categories as $category)
                        <div class="col-6">
                            <a href="#">
                                {{$category->name}}
                            </a>
                        </div>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Tags</h2>
                        @foreach ($tags as $tag)
                        <div class="col-6">
                            <a href="#">
                                {{$tag->name}}
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{asset('js/google-map.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>