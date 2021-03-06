<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Modern Architecture</title>

		<!-- Loading third party fonts -->
		<link href="{{ URL::asset('fonts/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ URL::asset('css/style-public.css') }}">


		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<script src="{{ asset('js/public/jquery-1.11.1.min.js') }}"></script>





	</head>


	<body>
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="{{ url('/') }}" id="branding">
						<img src="{{URL::asset('/images/logo.png')}}" alt="logo" class="logo">
						<div class="logo-text">
							<h1 class="site-title">VIỆT VŨ LONG</h1>
							<small class="site-description">Tư vấn thiết kế và Xây dựng</small>
						</div>
					</a> <!-- #branding -->


			

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item {{ Request::is('/')? 'current-menu-item' : '' }}"><a href="{{ route('homepage') }}">TRANG CHỦ</a></li>
							<li class="menu-item {{ Request::is('gioithieu')? 'current-menu-item' : '' }}"><a href="{{ route('gioithieu') }}">GIỚI THIỆU</a></li>
							@foreach($parentcats as $parentcat)
							<li class="menu-item {{ Request::is('danhmuc/'.$parentcat->id)? 'current-menu-item' : '' }}" id="{{ $parentcat->name }}"><a href="{{ route('danhmuc',$parentcat->id) }}">{{ $parentcat->name }}</a></li>
							@endforeach
							<li class="menu-item {{ Request::is('phongthuy')? 'current-menu-item' : '' }}" id="phongthuy"><a href="{{ route('phongthuy') }}">PHONG THỦY</a></li>
							<li class="menu-item {{ Request::is('contact')? 'current-menu-item' : '' }}"><a href="{{ route('contact.index') }}">LIÊN HỆ</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

			

			<!-- content -->
			@yield('content')


			<footer class="site-footer">
				<div class="container">
					<div class="pull-left">

						<address>
							<strong style="text-transform: uppercase;">{{ $infor->name}}</strong>
							<p>{{$infor->address}}</p>
						</address>

						<span class="phone">{{ $infor->phone}}</span>
					</div> <!-- .pull-left -->
					<div class="pull-right">

						<div class="social-links">

							<a href="{{$infor->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="{{$infor->google}}" target="_blank"><i class="fa fa-google-plus"></i></a>
							<a href="{{$infor->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="{{$infor->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a>

						</div>

					</div> <!-- .pull-right -->

					<!-- <div class="colophon">something here<a href="http://www.evita.com.vn/" title="Designed by VandelayDesign.com" target="_blank"> evita.com.vn</a>. All rights reserved.</div> -->

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->
		</div>

		<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('js/public/plugins.js') }}"></script>
		<script src="{{ asset('js/public/app.js') }}"></script>
		
	</body>

</html>
