<?php $__env->startSection('content'); ?>
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
							<select class="mobile-filter">
								<option value="">Furniture</option>
								<option value="">Bếp</option>
								<option value="">Phòng tắm</option>
								<option value="">Đèn trang trí</option>
								<option value="">Sofa</option>
							</select>

							<a href="#" class="current" data-filter="*">Furniture</a>
							<a href="#" class="">Bếp</a>
							<a href="#" class="" >Phòng tắm</a>
							<a href="#" class="" >Đèn trang trí</a>
							<a href="#" class="" >Sofa</a>
						</div>

						<div class="filterable-items">
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<img src="dummy/large-thumb-1.jpg" alt="#" id="open-slideshow">
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
							<!-- Modal content -->
							<span style="float:right; width: 100%;">
							<div class="pagination dark" style="float: right;">
								<a href="#" class="pagenumber dark gradient"><<</a>
								<span class="pagenumber dark active">1</span>
								<a href="#" class="pagenumber dark gradient">2</a>
								<a href="#" class="pagenumber dark gradient">3</a>
								<a href="#" class="pagenumber dark gradient">1</a>
								<a href="#" class="pagenumber dark gradient">5</a>
								<a href="#" class="pagenumber dark gradient">6</a>
								<a href="#" class="pagenumber dark gradient">>></a>
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
		<div class="mySlides fade">
		  <img src="dummy/large-thumb-1.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-2.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-3.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-4.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-5.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-6.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-7.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-8.jpg" alt="#" id="open-slideshow">
		</div>

		<div class="mySlides fade">
		  <img src="dummy/large-thumb-9.jpg" alt="#" id="open-slideshow">
		</div>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
  </div>

</div>
<?php $__env->stopSection(); ?>

			
<?php echo $__env->make('frontend.layouts.frontendapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>