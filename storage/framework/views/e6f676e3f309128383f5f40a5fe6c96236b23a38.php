<?php $__env->startSection('content'); ?>
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="<?php echo e(url()->previous()); ?>" class="button-back"><img src="<?php echo e(URL::asset('/images/arrow-back.png')); ?>" alt="" class="icon">Quay lại</a>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="project-detail">
									<h1 class="project-title" style="color: #34b5d4;"><?php echo e($phongthuy->title); ?></h1>
									<p style="font-weight: bold;"><?php echo e($phongthuy->preview_text); ?></p>
									<div class="detail_text"><?php echo $phongthuy->detail_text; ?></div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>