@extends('frontend.layouts.frontendapp')

@section('content')
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="project.html" class="button-back"><img src="images/arrow-back.png" alt="" class="icon">Back to the projects</a>

						<div class="slideshow-container" style="width: 90%;">

						<div class="mySlides fade">
						  <img src="dummy/slide-1.jpg" style="width:100%">
						  <div class="text" style="background: #000; opacity: 0.8;">
						  	<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>

						<div class="mySlides fade">
						  <img src="dummy/slide-2.jpg" style="width:100%">
						  <div class="text" style="background: #000; opacity: 0.8;">
						  	<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>

						<div class="mySlides fade">
						  <img src="dummy/slide-3.jpg" style="width:100%">
						  <div class="text" style="background: #000; opacity: 0.8;">
						  	<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>

						<div class="mySlides fade">
						  <img src="dummy/slide-2.jpg" style="width:100%">
						  <div class="text" style="background: #000; opacity: 0.8;">
						  	<span>Chủ đầu tư&nbsp;: </span><span>Phan Thanh Thuận</span><br />
							<span>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span>100 Hùng Vương, Đà Nẵng</span><br>
							<span>Diện tích&nbsp;&nbsp;&nbsp;&nbsp;	: </span><span>10x30m</span></div>
						</div>

						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>

						</div>
						<br>

						<div style="text-align:center">
						  <span class="dot" onclick="currentSlide(1)"></span> 
						  <span class="dot" onclick="currentSlide(2)"></span> 
						  <span class="dot" onclick="currentSlide(3)"></span>
						  <span class="dot" onclick="currentSlide(4)"></span> 
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection