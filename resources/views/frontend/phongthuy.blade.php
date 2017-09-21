@extends('frontend.layouts.frontendapp')

@section('content')

	<main class="main-content">

		<div class="page">
			<div class="container">

				<div class="filterable-items">
					@if(count($phongthuy)>0)
						@foreach($phongthuy as $item)
							<div style="width: 33%; padding: 0 15px; float: left; margin-bottom: 30px;">
								<figure><a href="{{ route('phongthuysingle', $item->id) }}" style="height: 250px;">
										@if(empty($item->feature_image))
											<img src="{{URL::asset('/images/defaultimage.jpg')}}" alt="No Image" style="height:inherit; max-width: 100%;">
										@else
											<img src="{{URL::asset('/storage/phongthuy/'.$item->feature_image)}}" alt="{{$item->feature_image}} " style="height:inherit; max-width: 100%;">
										@endif
									</a></figure>
								<h3 class="entry-title" style="text-transform: none; font-size: 15px;font-size: 1.3857142857em; text-align:justify;"><a href="{{ route('phongthuysingle', $item->id) }}">{{$item->title}}</a></h3>
								<div class="date">{{ $item->created_at }}</div>
								<p style="text-align:justify; line-height: 1.5;">{{ $item->preview_text }}</p>
							</div>
						@endforeach
					@else
						<div class="project-item filterable-item shopping-center">
							<h3>KHÔNG CÓ BÀI VIẾT NÀO</h3>
						</div>
					@endif
						<span style="float:right; width: 100%; padding-right: 3%;">
							<div class="dark" style="float: right;">
								{{ $phongthuy->links() }}
							</div>
							</span>
				</div>
			</div>
		</div> <!-- .page -->

	</main> <!-- .main-content -->

@endsection