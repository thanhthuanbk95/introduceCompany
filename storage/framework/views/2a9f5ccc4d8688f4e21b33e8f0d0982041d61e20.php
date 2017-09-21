<?php $__env->startSection('content'); ?>

	<main class="main-content">

		<div class="page">
			<div class="container">

				<div class="filterable-items">
					<?php if(count($phongthuy)>0): ?>
						<?php $__currentLoopData = $phongthuy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div style="width: 33%; padding: 0 15px; float: left; margin-bottom: 30px;">
								<figure><a href="<?php echo e(route('phongthuysingle', $item->id)); ?>" style="height: 250px;">
										<?php if(empty($item->feature_image)): ?>
											<img src="<?php echo e(URL::asset('/images/defaultimage.jpg')); ?>" alt="No Image" style="height:inherit; max-width: 100%;">
										<?php else: ?>
											<img src="<?php echo e(URL::asset('/storage/phongthuy/'.$item->feature_image)); ?>" alt="<?php echo e($item->feature_image); ?> " style="height:inherit; max-width: 100%;">
										<?php endif; ?>
									</a></figure>
								<h3 class="entry-title" style="text-transform: none; font-size: 15px;font-size: 1.3857142857em; text-align:justify;"><a href="<?php echo e(route('phongthuysingle', $item->id)); ?>"><?php echo e($item->title); ?></a></h3>
								<div class="date"><?php echo e($item->created_at); ?></div>
								<p style="text-align:justify; line-height: 1.5;"><?php echo e($item->preview_text); ?></p>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<div class="project-item filterable-item shopping-center">
							<h3>KHÔNG CÓ BÀI VIẾT NÀO</h3>
						</div>
					<?php endif; ?>
						<span style="float:right; width: 100%; padding-right: 3%;">
							<div class="dark" style="float: right;">
								<?php echo e($phongthuy->links()); ?>

							</div>
							</span>
				</div>
			</div>
		</div> <!-- .page -->

	</main> <!-- .main-content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>