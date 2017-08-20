@extends('frontend.layouts.frontendapp')

@section('content')

			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="#" class="button-back"><img src="images/arrow-back.png" alt="" class="icon">Back to the projects</a>

						<div class="row">
							<div class="col-md-8">
								<div class="map"></div>

								<div class="contact-detail">
									<address>
										<div class="contact-icon">
											<img src="images/icon-marker.png" class="icon">
										</div>
										<p><strong>Company name INC.</strong> <br>532 Avenue Street, Omaha</p>
									</address>
									<a href="#" class="phone"><span class="contact-icon"><img src="images/icon-phone.png" class="icon"></span> +1 800 931 033</a>
									<a href="#" class="email"><span class="contact-icon"><img src="images/icon-envelope.png" class="icon"></span> contact@companyname.com</a>
								</div>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<div class="contact-form">
									<h2 class="section-title">Write us</h2>
									<p>Dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam dolorem.</p>

									<form action="#">
										<input type="text" placeholder="Your name..">
										<input type="text" placeholder="Email..">
										<input type="text" placeholder="website..">
										<textarea placeholder="Message..."></textarea>
										<p class="text-right">
											<button type="submit">Send message</button>
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection