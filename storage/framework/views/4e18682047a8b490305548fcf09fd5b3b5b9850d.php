<?php $__env->startSection('content'); ?>
<main class="main-content">
	<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
	<?php if(!empty($parentcat)): ?>
		<script>
            //set active parent cat
            document.getElementById("<?php echo e($parentcat->name); ?>").className='menu-item current-menu-item';
		</script>
	<?php endif; ?>
				<div class="page">
					<div class="container">
						<div class="filter-links filterable-nav">
							<?php if(count($categories) > 0): ?>
								<select class="mobile-filter" id="CatSelect" onchange="selectChange();">
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(Request::is('danhmuc/tieumuc/'.$category->id)): ?>
											<option value="<?php echo e(route('tieumuc', $category->id)); ?>" selected="selected"><?php echo e($category->name); ?></option>
										<?php else: ?>
											<option value="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<script type="text/javascript">
                                    function selectChange(){
                                        var id = document.getElementById("CatSelect").value;
                                        window.location=id;
                                    }
								</script>

								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(Request::is('danhmuc/'.$category->id_parent)): ?>
										<?php if($loop->first): ?>
											<a class="current" href="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></a>
										<?php else: ?>
											<a href="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></a>
										<?php endif; ?>
									<?php else: ?>
										<?php if(Request::is('danhmuc/tieumuc/'.$category->id)): ?>
											<a class="current" href="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></a>
										<?php elseif(!$loop->first || !Request::is('danhmuc/tieumuc/'.$category->id)): ?>
											<a href="<?php echo e(route('tieumuc', $category->id)); ?>"><?php echo e($category->name); ?></a>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>

						<div class="filterable-items">

							<?php if(count($papers)>0): ?>
								<?php ($i = 1); ?>
								<?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(!empty($paper->image)): ?>
										<div class="project-item">
											<figure class="featured-image">
												<img src="<?php echo e(url('storage/images/'.$paper->image)); ?>" alt="#" class="open-slideshow" id="<?php echo e($i); ?>" height="200">
											</figure>
										</div>
										<?php ($i = $i +1); ?>
									<?php endif; ?>
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

			

  <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="slideshow-container">
		<?php if(count($papers)>0): ?>
			<?php ($i = 1); ?>
			<?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(!empty($paper->image)): ?>
					<div class="mySlides fade">
						<img src="<?php echo e(url('storage/images/'.$paper->image)); ?>" alt="#" >
					</div>
				<?php endif; ?>
				<?php ($i = $i + 1); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
  </div>
	<script src="<?php echo e(URL::asset('js/public/furniture.js')); ?>"></script>
</div>
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>