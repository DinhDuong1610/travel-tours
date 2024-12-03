<!DOCTYPE html>
<html lang="en">

<head>
  <title>VyHa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    			/* Màu nền tối cho pagination */
	.pagination {
			background-color: #F9AB30; /* Tương đương với bg-dark của Bootstrap */
	}
	
	/* Màu chữ sáng cho các liên kết */
	.pagination .page-link {
			color: #F9AB30; /* Màu chữ sáng cho các trang */
	}
	
	/* Thay đổi màu khi hover */
	.pagination .page-item:hover .page-link {
			background-color: #F9AB30; /* Màu xám nhạt hơn khi hover */
			color: #ffffff; /* Màu chữ vẫn sáng khi hover */
	}
	
	/* Thay đổi màu của trang đang được chọn */
	.pagination .page-item.active .page-link {
			background-color: #F9AB30; /* Màu xanh lam cho trang hiện tại */
			color: #ffffff; /* Màu chữ sáng */
			border: none;
	}
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    @include('partials.nav');
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/place-7.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Sổ tay du lịch</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Bài viết <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Bài viết gần đây</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url({{asset('/storage/' . $blog->image)}});">
              {{-- <p>
                {{$blog->category->name}}
              </p> --}}
            </a>
            <div class="text p-4">
              <h5><a href="">
                  {{$blog->title}}
                </a></h5>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      {{-- {{ $blogs->links() }} --}}
      					<!-- Pagination -->
					<div class="d-flex justify-content-center">
						{{ $blogs->links('pagination::bootstrap-4')}}
					</div>
  </section>

  @include('partials.page-footer')



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>