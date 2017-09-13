@extends('frontend.layouts.frontendapp')

@section('content')
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<a href="{{ route('phongthuy') }}" class="button-back"><img src="{{URL::asset('/images/arrow-back.png')}}" alt="" class="icon">Quay lại</a>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="project-detail">
									<h1 class="project-title" style="color: #34b5d4;">{{ $phongthuy->title }}</h1>
									<p style="font-weight: bold;">{{ $phongthuy->preview_text }}</p>
									<div class="detail_text">{!! $phongthuy->detail_text !!}</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection

			