<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Modern Architecture</title>

		<!-- Loading third party fonts -->
		<link href="<?php echo e(URL::asset('fonts/font-awesome.min.css')); ?> " rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo e(URL::asset('css/style-public.css')); ?>">
		

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">VIỆT VŨ LONG</h1>
							<small class="site-description">Tư vấn thiết kế và Xây dựng</small>
						</div>
					</a> <!-- #branding -->


			

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="<?php echo e(url('/home')); ?>">TRANG CHỦ</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/about')); ?>">GIỚI THIỆU</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/project')); ?>">DỰ ÁN</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/furniture')); ?>">NỘI THẤT</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/phongthuy')); ?>">PHONG THỦY</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/contact')); ?>">LIÊN HỆ</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

			

			<!-- content -->
			<?php echo $__env->yieldContent('content'); ?>


			<footer class="site-footer">
				<div class="container">
					<div class="pull-left">

						<address>
							<strong>CÔNG TY TNHH TƯ VẤN THIẾT KẾ VÀ XÂY DỰNG VIỆT VŨ LONG - EVITA</strong>
							<p>78 Nguyễn Đình Tựu, Q. Thanh Khê, Tp Đà Nẵng</p>
						</address>

						<a href="#" class="phone">0934 380 037</a>
					</div> <!-- .pull-left -->
					<div class="pull-right">

						<div class="social-links">

							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>

						</div>

					</div> <!-- .pull-right -->

					<!-- <div class="colophon">something here<a href="http://www.evita.com.vn/" title="Designed by VandelayDesign.com" target="_blank"> evita.com.vn</a>. All rights reserved.</div> -->

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->
		</div>

		<script src="<?php echo e(URL::asset('js/public/jquery-1.11.1.min.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('js/public/plugins.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('js/public/app.js')); ?>"></script>
		
	</body>

</html>
