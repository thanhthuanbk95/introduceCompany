<?php $__env->startSection('content'); ?>
<div class="hero hero-slider">
				<ul class="slides">
					<li data-bg-image="dummy/slide-1.jpg">
						<div class="container">
							<div class="slide-title">
								<span>Project's Name</span> <br>
								<span>...</span>
							</div>
						</div>
					</li>
					<li data-bg-image="dummy/slide-2.jpg">
						<div class="container">
							<div class="slide-title">
								<span>Project's Name</span> <br>
								<span>...</span>
							</div>
						</div>
					</li>
					<li data-bg-image="dummy/slide-3.jpg">
						<div class="container">
							<div class="slide-title">
								<span>Project's Name</span> <br>
								<span>...</span>
							</div>
						</div>
					</li>
					<li data-bg-image="dummy/slide-2.jpg">
						<div class="container">
							<div class="slide-title">
								<span>Project's Name</span> <br>
								<span>...</span>
							</div>
						</div>
					</li>
				</ul> <!-- .slides -->
			</div> <!-- .hero-slider -->			

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>