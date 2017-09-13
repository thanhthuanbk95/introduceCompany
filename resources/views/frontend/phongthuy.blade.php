@extends('frontend.layouts.frontendapp')

@section('content')
			
			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<ul class="news-list">
							@foreach($phongthuy as $item)
							<li>
								<figure><a href="{{ route('phongthuysingle', $item->id) }}">
								@if(empty($item->feature_image))
									<img src="{{URL::asset('/images/phongthuy/defaultimage.jpg')}}" alt="No Image">
								@else
									<img src="{{URL::asset('/images/phongthuy/'.$item->feature_image)}}" alt="{{$item->feature_image}}">
								@endif
								</a></figure>
								<h3 class="entry-title"><a href="{{ route('phongthuysingle', $item->id) }}">{{$item->title}}</a></h3>
								<div class="date">{{ $item->created_at }}</div>
								<p>{{ $item->preview_text }}</p>
							</li>
							@endforeach
						</ul>
						<span style="float:right; width: 100%; padding-right: 3%;">
							<div class="dark" style="float: right;">
								{{ $phongthuy->links() }}
							</div>
							</span>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->

			@endsection