<?php $__env->startSection('content'); ?>
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
							<select class="mobile-filter">
								<option value=".shopping-center">Furniture</option>
								<option value="*">Bếp</option>
								<option value=".skyscraper">Phòng tắm</option>
								<option value=".shopping-center">Đèn trang trí</option>
								<option value=".shopping-center">Sofa</option>
							</select>
							<a href="#" class="current wow fadeInRight" data-filter="*">Furniture</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".skyscraper">Bếp</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".shopping-center">Phòng tắm</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".apartment">Đèn trang trí</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".apartment">Sofa</a>
						</div>

						<div class="filterable-items">
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-1.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-2.jpg" alt="#"></a>
								</figure>
							</div>
							<div class="project-item filterable-item skyscraper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-3.jpg" alt="#"></a>
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
									<!-- <figcaption>
										<h2 class="project-title"><a href="project-single.html">quam exercitationem</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption> -->
								</figure>
							</div>
							<div class="Pagination">
									<div class="page"><img src="images/page.png" class="page-img"><span class="page-number">1</span></div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>