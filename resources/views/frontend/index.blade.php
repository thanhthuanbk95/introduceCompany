@extends('frontend.layouts.frontendapp')

@section('content')
<div class="hero hero-slider">
				<ul class="slides">
					@foreach($images as $image)
						<li data-bg-image="{{ url('storage/indexImage/'.$image->name) }}">
							<div class="container">
								<div class="slide-title">
								</div>
							</div>
						</li>
					@endforeach
				</ul> <!-- .slides -->
			</div> <!-- .hero-slider -->			

@endsection
