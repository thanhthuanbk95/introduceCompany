<?php $__env->startSection('content'); ?>
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
						<?php if(count($categories) > 0): ?>
							<select class="mobile-filter">
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>	
						</div>
						<div class="filterable-items">
						<?php if(count($papers)>0): ?>
							<?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="project-item filterable-item shopping-center">
									<figure class="featured-image">
										<a href="<?php echo e(route('baiviet',$paper->id)); ?>">
										<img src="<?php echo e(url('storage/images/'.$paper->image)); ?>" alt="#" width="400px" height="300px"><span class="project-title"><?php echo e($paper->user); ?></span>
										</a>
									</figure>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<div class="project-item filterable-item shopping-center">
								<h3>KHÔNG CÓ BÀI VIẾT NÀO</h3>
							</div>
						<?php endif; ?>	
							<span style="float:right; width: 100%;">
							<div class="pagination dark" style="float: right;">
								<?php if(count($papers) > 0): ?>
									<?php echo e($papers->links()); ?>

								<?php endif; ?>
							</div>
							</span>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>