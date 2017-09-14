<?php $__env->startSection('content'); ?>
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
							<select class="mobile-filter">
								<option value="">Biệt thự</option>
								<option value="">Bar, Nhà hàng, Cafe</option>
								<option value="">Nhà phố</option>
								<option value="">Công cộng - Dịch vụ</option>
								<option value="	">Thi công</option>
							</select>

							<a href="#" class="current" data-filter="*">Biệt thự</a>
							<a href="#" class="">Bar, Nhà hàng, Cafe</a>
							<a href="#" class="" >Nhà phố</a>
							<a href="#" class="" >Công cộng - Dịch vụ</a>
							<a href="#" class="" >Thi công</a>
						</div>

						<div class="filterable-items">
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<a href="<?php echo e(url('/project-single')); ?>"><img src="<?php echo e(URL::asset('/dummy/large-thumb-1.jpg')); ?>" alt="#"><span class="project-title">Phan Thanh Thuận</span></a>

								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="<?php echo e(URL::asset('/dummy/large-thumb-2.jpg')); ?>" alt="#"><span class="project-title">Phan Thanh Thuận</span></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscraper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="<?php echo e(URL::asset('/dummy/large-thumb-3.jpg')); ?>" alt="#"><span class="project-title">Phan Thanh Thuận</span></a>
								</figure>
							</div>
							<div class="project-item filterable-item apartment">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-4.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-5.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-6.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-7.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-8.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-9.jpg" alt="#"></a>
								</figure>
							</div>
							<span style="float:right; width: 100%;">
							<div class="pagination dark" style="float: right;">
								<a href="#" class="pagenumber dark gradient"><<</a>
								<span class="pagenumber dark active">1</span>
								<a href="#" class="pagenumber dark gradient">2</a>
								<a href="#" class="pagenumber dark gradient">3</a>
								<a href="#" class="pagenumber dark gradient">4</a>
								<a href="#" class="pagenumber dark gradient">5</a>
								<a href="#" class="pagenumber dark gradient">6</a>
								<a href="#" class="pagenumber dark gradient">>></a>
							</div>
							</span>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>