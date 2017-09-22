@extends('frontend.layouts.frontendapp')

@section('content')
			<script>
				//set active parent cat
                document.getElementById("{{$parentcat->name}}").className='menu-item current-menu-item';
			</script>
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="{{ url()->previous() }}" class="button-back"><img src="{{ asset('/images/arrow-back.png') }}" alt="" class="icon">QUAY LẠI</a>

						<div class="slideshow-container" style="width: 100%;">
					@if(count($images) > 0)
						@foreach($images as $image)
						<div class="mySlides fade">
							<img src="{{ url('storage/images/'.$image->name)}}" style="width: 100%">
						</div>
						
						@endforeach
					@else
						<div class="mySlides fade">
							<img src="{{ asset('images/projectsingledefault.png') }}" style="width: 100%;">
						</div>
					@endif
						<div class="text project-detail" style="background: #000; opacity: 0.6;">
						  	{!! $paper->describe !!}
						</div>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>

						</div>
						<br>

						<div style="text-align:center">
						@for($i = 1; $i<= count($images);$i++)
						  	<span class="dot" onclick="currentSlide({{ $i }})"></span>
						@endfor
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
			<script src="{{ URL::asset('js/public/single-project.js') }}"></script>
@endsection