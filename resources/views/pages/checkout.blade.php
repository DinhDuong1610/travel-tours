<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/checkout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/checkout_responsive.css') }}">
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo"><a href="{{ route('pages.welcome') }}">VyHa.</a></div>
                                <nav class="main_nav">
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Panel -->
            <div class="search_panel trans_300">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                                <form action="#">
                                    <input type="text" class="search_input" placeholder="Search" required="required">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social -->
            <div class="header_social">
                <ul>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </header>



        <!-- Checkout -->

        <div class="checkout">
            <div class="container">
                <div class="row">

                    <!-- Billing Info -->
                    <div class="col-lg-6">
                        <div class="billing checkout_section">
                            <div class="section_title">Thông tin cá nhân</div>
                            <div class="section_subtitle">Hãy điền đầy đủ thông tin người đặt tour</div>
                            <div class="checkout_form_container">
                                <form action="#" id="checkout_form" method="POST" class="checkout_form">
                                    @csrf
                                    <div>
                                        <!-- Name -->
                                        <label for="checkout_name">Họ và tên*</label>
                                        <input type="text" id="checkout_name"
                                            class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                            name="name" id="name" required="required">
                                        @if ($errors->has('name'))
                                            <div class="error">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <!-- Phone no -->
                                        <label for="checkout_phone">Số điện thoại*</label>
                                        <input type="phone" id="checkout_phone"
                                            class="form-control {{ $errors->has('phone') ? 'error' : '' }}"
                                            name="phone" id="phone" required="required">
                                        @if ($errors->has('phone'))
                                            <div class="error">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <!-- Email -->
                                        <label for="checkout_email">Email*</label>
                                        <input type="phone" id="checkout_email"
                                            class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                            name="email" id="email" required="required">
                                        @if ($errors->has('email'))
                                            <div class="error">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <!-- Number of passengers -->
                                        <label for="checkout_email">Số hành khách*</label>
                                        <input type="number" id="number_of_passengers"
                                            class="form-control {{ $errors->has('number_of_passengers') ? 'error' : '' }}"
                                            name="number_of_passengers" id="number_of_passengers" required="required">
                                        @if ($errors->has('number_of_passengers'))
                                            <div class="error">
                                                {{ $errors->first('number_of_passengers') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <!-- Number of passengers -->
                                        <label for="checkout_email">Ngày khởi hành*</label>
                                        <input type="date" id="departure_date"
                                            class="form-control {{ $errors->has('departure_date') ? 'error' : '' }}"
                                            name="departure_date" id="departure_date" required="required">
                                        @if ($errors->has('departure_date'))
                                            <div class="error">
                                                {{ $errors->first('departure_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <!-- Number of passengers -->
                                        <label for="checkout_email">Ghi chú*</label>
                                        <input type="text" id="notes"
                                            class="form-control {{ $errors->has('notes') ? 'error' : '' }}"
                                            name="notes" id="notes" required="required">
                                        @if ($errors->has('notes'))
                                            <div class="error">
                                                {{ $errors->first('notes') }}
                                            </div>
                                        @endif
                                    </div>

                                    <input type="hidden" id="user_id"
                                        class="form-control"
                                        name="user_id" id="user_id" required="required" value="{{ Auth::user()->id }}">

                                    <input type="hidden" id="destination_id"
                                        class="form-control"
                                        name="destination_id" id="destination_id" required="required" value="{{ $destinations->id }}">


                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Info -->

                    <div class="col-lg-6">
                        <div class="order checkout_section">
                            <div class="section_title">Đặt tour</div>

                            <!-- Order details -->
                            <div class="order_list_container">
                                <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Tour</div>
                                    <div class="order_list_value ml-auto">Tổng</div>
                                </div>
                                <ul class="order_list">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="order_list_title">{{ $destinations->title }}</div>
                                        <div class="order_list_value ml-auto">{{ number_format($destinations->pricing, 0, ',', '.') }}</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
																			<div class="order_list_title">Số hành khách</div>
																			<div class="order_list_value ml-auto" id="passenger_count">0</div>
																	</li>
																	<li class="d-flex flex-row align-items-center justify-content-start">
																		<div class="order_list_title">Tổng tiền</div>
																		<div class="order_list_value ml-auto" id="total_price">{{ $destinations->pricing }}</div>
																</li>
                                </ul>
                            </div>

                            <!-- Order Text -->
                            <div class="order_text">Bạn đang nóng lòng bắt đầu chuyến đi của mình?</div>

														<div class="d-flex justify-content-center"><button type="submit" class="btn btn-dark mt-5 mb-3 py-2 px-4">Đặt ngay</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>

		<script>
			document.addEventListener("DOMContentLoaded", function() {
					const numberOfPassengersInput = document.getElementById('number_of_passengers');
					const passengerCountDisplay = document.getElementById('passenger_count');
					const totalPriceDisplay = document.getElementById('total_price');
					const pricingPerPassenger = parseFloat('{{ $destinations->pricing }}');
	
					function formatCurrency(amount) {
							return new Intl.NumberFormat('vi-VN', {
									style: 'currency',
									currency: 'VND',
							}).format(amount);
					}
	
					function updatePassengerCountAndTotalPrice() {
							const numberOfPassengers = parseInt(numberOfPassengersInput.value) || 1;  
							const totalPrice = numberOfPassengers * pricingPerPassenger; 
	
							passengerCountDisplay.textContent = numberOfPassengers;
							totalPriceDisplay.textContent = formatCurrency(totalPrice);
					}
	
					numberOfPassengersInput.addEventListener('input', updatePassengerCountAndTotalPrice);
	
					updatePassengerCountAndTotalPrice();
			});
	</script>
	
	
	
	
</body>

</html>
