<?php $__env->startSection('content'); ?>
<main class="main-content">
				<div class="page">
					<div class="container">
						<div class="col-md-10 col-md-offset-1">
							<?php echo $introduce->detail; ?>

						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>