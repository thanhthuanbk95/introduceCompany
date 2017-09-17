<?php $__env->startSection('content'); ?>
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="<?php echo e(url()->previous()); ?>" class="button-back"><img src="<?php echo e(asset('/images/arrow-back.png')); ?>" alt="" class="icon">QUAY LẠI</a>

						<div class="slideshow-container" style="width: 90%;">
							<h3><?php echo e($paper->title); ?></h3>
					<?php if(count($images) > 0): ?>
						<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="mySlides fade">
							<a href=""><img src="<?php echo e(url('storage/images/'.$image->name)); ?>" width="1026px" height="641px"></a>
						  	<div class="text" style="background: #000; opacity: 0.8;">
						  		<span><?php echo e($paper->describe); ?></span>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<div class="mySlides fade">
							<img src="<?php echo e(URL::asset('/dummy/slide-1.jpg')); ?>" style="width:100%">
							<div class="text" style="background: #000; opacity: 0.8;">
							<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>
					<?php endif; ?>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>

						</div>
						<br>

						<div style="text-align:center">
						<?php for($i = 1; $i<= count($images);$i++): ?>
						  	<span class="dot" onclick="currentSlide(<?php echo e($i); ?>)"></span>
						<?php endfor; ?>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
			<script src="<?php echo e(URL::asset('js/public/single-project.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>