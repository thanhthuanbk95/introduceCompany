<?php $__env->startSection('content'); ?>
<div class="hero hero-slider">
				<ul class="slides">
					<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li data-bg-image="<?php echo e(url('storage/indexImage/'.$image->name)); ?>">
							<div class="container">
								<div class="slide-title">
								</div>
							</div>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul> <!-- .slides -->
			</div> <!-- .hero-slider -->			

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>