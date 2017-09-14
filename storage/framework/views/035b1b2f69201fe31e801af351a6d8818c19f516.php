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
		

		<script src="<?php echo e(asset('js/public/ie-support/html5.js')); ?>"></script>
		<script src="<?php echo e(asset('js/public/ie-support/respond.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>

	</head>


	<body>
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="<?php echo e(url('/')); ?>" id="branding">
						<img src="<?php echo e(URL::asset('/images/logo.png')); ?>" alt="logo" class="logo">
						<div class="logo-text">
							<h1 class="site-title">VIỆT VŨ LONG</h1>
							<small class="site-description">Tư vấn thiết kế và Xây dựng</small>
						</div>
					</a> <!-- #branding -->


			

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="<?php echo e(url('/')); ?>">TRANG CHỦ</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/about')); ?>">GIỚI THIỆU</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/project')); ?>">DỰ ÁN</a></li>
							<li class="menu-item"><a href="<?php echo e(url('/furniture')); ?>">NỘI THẤT</a></li>
							<li class="menu-item"><a href="<?php echo e(route('phongthuy')); ?>">PHONG THỦY</a></li>
							<li class="menu-item"><a href="<?php echo e(route('contact.index')); ?>">LIÊN HỆ</a></li>
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
							<strong style="text-transform: uppercase;"><?php echo e($infor->name); ?></strong>
							<p><?php echo e($infor->address); ?></p>
						</address>

						<span class="phone"><?php echo e($infor->phone); ?></span>
					</div> <!-- .pull-left -->
					<div class="pull-right">

						<div class="social-links">

							<a href="http://<?php echo e($infor->facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="http://<?php echo e($infor->google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
							<a href="http://<?php echo e($infor->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="http://<?php echo e($infor->pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>

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
