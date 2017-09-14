@extends('frontend.layouts.frontendapp')

@section('content')
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="{{ url()->previous() }}" class="button-back"><img src="{{ asset('/images/arrow-back.png') }}" alt="" class="icon">QUAY LẠI</a>

						<div class="slideshow-container" style="width: 90%;">
							<h3>{{ $paper->title }}</h3>
					@if(count($images) > 0)
						@foreach($images as $image)
						<div class="mySlides fade">
							<a href=""><img src="{{ url('storage/images/'.$image->name) }}" width="1026px" height="641px"></a>
						  	<div class="text" style="background: #000; opacity: 0.8;">
						  		<span>{{ $paper->describe }}</span>
							</div>
						</div>
						@endforeach
					@else
						<div class="mySlides fade">
							<img src="{{URL::asset('/dummy/slide-1.jpg')}}" style="width:100%">
							<div class="text" style="background: #000; opacity: 0.8;">
							<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>
					@endif
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