@extends('frontend.layouts.frontendapp')

@section('content')
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
							<select class="mobile-filter">
								<option value="*">Nhân sự</option>
								<option value=".skyscraper">Hoạt động</option>
								<option value=".shopping-center">Thi Công</option>
							</select>
							<a href="#" class="current wow fadeInRight" data-filter="*">Nhân sự</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".skyscraper">Hoạt động</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".shopping-center">Thi Công</a>
							<a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".apartment">apartment</a>
						</div>

						<div class="filterable-items">
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-1.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Lorem ipsum dolor sit amet</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-2.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Consectetur adipisicing elit</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscraper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-3.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Repellat fugit tenetur</a></h2> 
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item apartment">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-4.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Asperiores quas voluptatem</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-5.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Ex quos ab perspiciatis</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-6.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Natus dolores ad et ipsam</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item shopping-center">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-7.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Hic nisi. Animi placeat</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-8.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">Obcaecati quam</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
							<div class="project-item filterable-item skyscrapper">
								<figure class="featured-image">
									<a href="project-single.html"><img src="dummy/large-thumb-9.jpg" alt="#"></a>
									<figcaption>
										<h2 class="project-title"><a href="project-single.html">quam exercitationem</a></h2>
										<p class="project-subtotle">Maecenas dictum suscipit</p>
										<p>Sed ut perspiciatis unde omnis iste natus accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
										<a href="#" class="more-link"><img src="images/arrow.png" alt=""></a>
									</figcaption>
								</figure>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection

			