<?php $__env->startSection('content'); ?>
			
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<ul class="news-list">
							<?php $__currentLoopData = $phongthuy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<figure><a href="<?php echo e(route('phongthuysingle', $item->id)); ?>">
								<?php if(empty($item->feature_image)): ?>
									<img src="<?php echo e(URL::asset('/images/phongthuy/defaultimage.jpg')); ?>" alt="No Image">
								<?php else: ?>
									<img src="<?php echo e(URL::asset('/images/phongthuy/'.$item->feature_image)); ?>" alt="<?php echo e($item->feature_image); ?>">
								<?php endif; ?>
								</a></figure>
								<h3 class="entry-title"><a href="<?php echo e(route('phongthuysingle', $item->id)); ?>"><?php echo e($item->title); ?></a></h3>
								<div class="date"><?php echo e($item->created_at); ?></div>
								<p><?php echo e($item->preview_text); ?></p>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<span style="float:right; width: 100%; padding-right: 3%;">
							<div class="dark" style="float: right;">
								<?php echo e($phongthuy->links()); ?>

							</div>
							</span>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->

			<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>