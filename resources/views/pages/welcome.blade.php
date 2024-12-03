@extends('layouts.page')

@section('page')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	@include('partials.nav')
</nav>
<!-- END nav -->

<div class="hero-wrap js-fullheight" style="background-image: url('images/place-6.jpg');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
			data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
				<p class="caps" data-scrollax="properties: { translateY: '40%', opacity: 1.6 }">Du lịch đến mọi nơi trên thế giới mà không phải tìm đâu xa</p>
				<h1 data-scrollax="properties: { translateY: '50%', opacity: 1.6 }"><b>Chào mừng đến với VyHa</b><br>Đi đến bất kỳ đâu bạn muốn</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-wrap-1 ftco-animate p-4">
				<form action="#" class="input-group" method="GET">
						<div class="row">
							<div class="col-lg align-items-end">
								<div class="form-group">
									<label for="#">Điểm đến</label>
									<div class="form-field">
										{{-- <div class="icon"><span class="ion-ios-search"></span></div> --}}
										<input type="text" class="form-control" placeholder="Địa điểm">
									</div>
								</div>
							</div>
							<div class="col-lg align-self-end">
								<div class="form-group">
									<div class="form-field">
										<input type="submit" value="Tìm kiếm" class="form-control btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section services-section bg-light">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate">
				<h2 class="mb-4">Khám phá hành trình tuyệt vời cùng chúng tôi</h2>
				<p>Hãy chuẩn bị cho một chuyến phiêu lưu đầy thú vị đến những điểm đến hấp dẫn trên khắp đất nước. Từ những bãi biển thơ mộng, những ngọn núi hùng vĩ cho đến những thành phố cổ kính, mỗi địa điểm đều mang trong mình những câu chuyện và vẻ đẹp riêng biệt chờ đón bạn khám phá.</p>
				<p>Chúng tôi cung cấp các tour du lịch linh hoạt, giúp bạn dễ dàng lựa chọn hành trình phù hợp với sở thích và nhu cầu. Dù bạn yêu thích những kỳ nghỉ thư giãn hay các hoạt động mạo hiểm, chúng tôi luôn sẵn sàng đồng hành cùng bạn trong mỗi bước đi.</p>
				<p><a href="#" class="btn btn-primary py-3 px-4">Tìm kiếm điểm đến</a></p>
		</div>	
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-block">
									<div class="icon"><span class="flaticon-paragliding"></span></div>
									<div class="media-body">
											<h3 class="heading mb-3">Hoạt Động Du Lịch</h3>
											<p>Khám phá những hoạt động thú vị từ dù lượn, leo núi, đi bộ đường dài đến các trò chơi mạo hiểm, mang đến cho bạn trải nghiệm không thể quên.</p>
									</div>
							</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-block">
									<div class="icon"><span class="flaticon-route"></span></div>
									<div class="media-body">
											<h3 class="heading mb-3">Lên Kế Hoạch Du Lịch</h3>
											<p>Chúng tôi giúp bạn lên kế hoạch chi tiết cho chuyến đi, từ việc lựa chọn điểm đến đến các dịch vụ đi kèm, đảm bảo chuyến đi của bạn thật hoàn hảo.</p>
									</div>
							</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-block">
									<div class="icon"><span class="flaticon-tour-guide"></span></div>
									<div class="media-body">
											<h3 class="heading mb-3">Hướng Dẫn Viên Cá Nhân</h3>
											<p>Đảm bảo chuyến đi của bạn trở nên đặc biệt với dịch vụ hướng dẫn viên riêng, giúp bạn khám phá những điểm đến thú vị một cách trọn vẹn nhất.</p>
									</div>
							</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-block">
									<div class="icon"><span class="flaticon-map"></span></div>
									<div class="media-body">
											<h3 class="heading mb-3">Quản Lý Địa Điểm</h3>
											<p>Chúng tôi giúp bạn tìm kiếm và quản lý các địa điểm du lịch, đảm bảo rằng mọi chuyến đi đều thuận lợi và đáng nhớ.</p>
									</div>
							</div>
					</div>
			</div>
			
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter img" id="section-counter">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 d-flex">
					<div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
			</div>
			<div class="col-md-6 pl-md-5 py-5">
					<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
									<h2 class="mb-4">Tạo Dấu Ấn Cho Chuyến Đi Của Bạn Cùng Chúng Tôi</h2>
									<p>Chúng tôi mang đến những chuyến đi đầy trải nghiệm, từ những điểm đến nổi tiếng đến các hành trình khám phá mới mẻ. Hãy để chúng tôi giúp bạn khám phá những địa danh tuyệt vời và tạo nên những kỷ niệm đáng nhớ trong mỗi chuyến đi.</p>
							</div>
					</div>
					<div class="row">
							<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
									<div class="block-18 text-center mb-4">
											<div class="text">
													<strong class="number" data-number="300">0</strong>
													<span>Chuyến Đi Thành Công</span>
											</div>
									</div>
							</div>
							<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
									<div class="block-18 text-center mb-4">
											<div class="text">
													<strong class="number" data-number="24000">0</strong>
													<span>Khách Du Lịch Hài Lòng</span>
											</div>
									</div>
							</div>
							<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
									<div class="block-18 text-center mb-4">
											<div class="text">
													<strong class="number" data-number="200">0</strong>
													<span>Địa Điểm Khám Phá</span>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	
	</div>
</section>


{{-- <section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Popular Destinations</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 ftco-animate">
				<div class="project-destination">
					<a href="#" class="img" style="background-image: url(images/place-1.jpg);">
						<div class="text">
							<h3>Singapore</h3>
							<span>8 Tours</span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3 ftco-animate">
				<div class="project-destination">
					<a href="#" class="img" style="background-image: url(images/place-2.jpg);">
						<div class="text">
							<h3>Canada</h3>
							<span>2 Tours</span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3 ftco-animate">
				<div class="project-destination">
					<a href="#" class="img" style="background-image: url(images/place-3.jpg);">
						<div class="text">
							<h3>Thailand</h3>
							<span>5 Tours</span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3 ftco-animate">
				<div class="project-destination">
					<a href="#" class="img" style="background-image: url(images/place-4.jpg);">
						<div class="text">
							<h3>Australia</h3>
							<span>5 Tours</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section> --}}

<section class="ftco-section ftco-no-pt mt-5">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Điểm đến du lịch</h2>
			</div>
		</div>
		<div class="row">

			@foreach ($destinations as $destination)
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
				<a href="{{route('pages.detail', ['slug' => $destination->slug])}}" class="img" style="background-image: url({{asset('/storage/' . $destination->image)}});">
						{{-- <p>
							{{$destination->category->name}}
						</p> --}}
					</a>
					<div class="text p-4">
						<span class="price">{{ number_format($destination->pricing, 0, ',', '.') }} VND</span>
						<span class="days">{{$destination->description}}</span>
						<h3><a href="{{route('pages.detail', ['slug' => $destination->slug])}}">
								{{$destination->title}}
							</a></h3>
						<ul>
							<li><span class="flaticon-shower"></span></li>
							<li><span class="flaticon-king-size"></span></li>
							<li><span class="flaticon-sun-umbrella"></span></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{-- {{ $destinations->appends(['search' => request()->query('search')])->links() }} --}}

					<!-- Pagination -->
					<div class="d-flex justify-content-center">
						{{ $destinations->links('pagination::bootstrap-4')}}
					</div>
	</div>

	
</section>


@include('partials.page-footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" /></svg></div>


@endsection

@section('css')
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
@endsection