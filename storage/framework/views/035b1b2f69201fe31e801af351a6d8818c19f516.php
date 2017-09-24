<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="shortcut icon" type="image/gif" href="<?php echo e(URL::asset('/images/icontitle.png')); ?>" />

		<title>Việt Vũ Long - Tư vấn thiết kê và xây dựng</title>

		<meta name="keywords" content="evita, design, architecture, tư vấn thiết kế, xây dựng, Thiết kế nhà đẹp , nội thất đẹp , công ty kiến trúc , thi công nội thất đẹp . Thiết kế nhà hàng , cafe">
		<meta name="description" content="">

		<!-- Loading third party fonts -->
		<link href="<?php echo e(URL::asset('fonts/font-awesome.min.css')); ?> " rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo e(URL::asset('css/style-public.css')); ?>">


		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<script src="<?php echo e(asset('js/public/jquery-1.11.1.min.js')); ?>"></script>





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
							<li class="menu-item <?php echo e(Request::is('/')? 'current-menu-item' : ''); ?>"><a href="<?php echo e(route('homepage')); ?>">TRANG CHỦ</a></li>
							<li class="menu-item <?php echo e(Request::is('gioithieu')? 'current-menu-item' : ''); ?>"><a href="<?php echo e(route('gioithieu')); ?>">GIỚI THIỆU</a></li>
							<?php $__currentLoopData = $parentcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="menu-item <?php echo e(Request::is('danhmuc/'.$parentcat->id)? 'current-menu-item' : ''); ?>" id="<?php echo e($parentcat->name); ?>"><a href="<?php echo e(route('danhmuc',$parentcat->id)); ?>"><?php echo e($parentcat->name); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<li class="menu-item <?php echo e(Request::is('phongthuy')? 'current-menu-item' : ''); ?>" id="phongthuy"><a href="<?php echo e(route('phongthuy')); ?>">PHONG THỦY</a></li>
							<li class="menu-item <?php echo e(Request::is('contact')? 'current-menu-item' : ''); ?>"><a href="<?php echo e(route('contact.index')); ?>">LIÊN HỆ</a></li>
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

							<a href="<?php echo e($infor->facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo e($infor->google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
							<a href="<?php echo e($infor->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="<?php echo e($infor->pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>

						</div>

					</div> <!-- .pull-right -->

					<!-- <div class="colophon">something here<a href="http://www.evita.com.vn/" title="Designed by VandelayDesign.com" target="_blank"> evita.com.vn</a>. All rights reserved.</div> -->

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->
		</div>

		<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/public/plugins.js')); ?>"></script>
		<script src="<?php echo e(asset('js/public/app.js')); ?>"></script>

	</body>

</html>
