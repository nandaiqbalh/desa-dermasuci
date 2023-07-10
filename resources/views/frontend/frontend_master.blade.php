<!DOCTYPE html>
<html lang="en">
<head>
	<title>Desa Dermasuci</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">

	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('frontend.component.navbar')

	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">

            @foreach ($highlights as $item)

			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                        <div class="one-third order-md-last img" style="background-image:url({{ asset('images/' . $item->image_file) }});">
                            <div class="overlay"></div>
                            <div class="overlay-1"></div>
                        </div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading"> {{$item -> subtitle}} </span>
								<h1 class="mb-4 mt-3">{{$item -> title}}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</section>

	<footer class="ftco-footer ftco-section">
		<div class="container">

			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


		<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('frontend/js/popper.min.js')}}"></script>
		<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('frontend/js/scrollax.min.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{asset('frontend/js/google-map.js')}}"></script>

		<script src="{{asset('frontend/js/main.js')}}"></script>

	</body>
	</html>
