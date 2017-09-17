@extends('frontend.layouts.frontendapp')

@section('content')
<main class="main-content">
				
				<div class="page">
					<div class="container">
						<!-- <h2 class="entry-title"></h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> -->

						<div class="filter-links filterable-nav">
						@if(count($categories) > 0)
							<select class="mobile-filter" id="CatSelect" onchange="selectChange();">
							@foreach($categories as $category)
								<option value="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</option>
							@endforeach
							</select>
							<script type="text/javascript">
								function selectChange(){
									var id = document.getElementById("CatSelect").value;
									window.location=id;
								}
							</script>
							@foreach($categories as $category)
								@if(Request::is('danhmuc/*'))
									@if($loop->first)
										<a class="current" href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
									@endif
								@endif
								@if(Request::is('danhmuc/tieumuc/'.$category->id))
									<a class="current" href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
								@else
									<a href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
								@endif
							@endforeach
						@endif	
						</div>
						<div class="filterable-items">
						@if(count($papers)>0)
							@foreach($papers as $paper)
								<div class="project-item filterable-item shopping-center">
									<figure class="featured-image">
										<a href="{{ route('baiviet',$paper->id) }}">
										@if(empty($paper->image))
										<img src="{{ asset('images/projectdefault.png') }}" alt="#" ><span class="project-title">
										@else
										<img src="{{ url('storage/images/'.$paper->image) }}" alt="#" ><span class="project-title">
										@endif
											{{ $paper->title }}</span>
										</a>
									</figure>
								</div>
							@endforeach
						@else
							<div class="project-item filterable-item shopping-center">
								<h3>KHÔNG CÓ BÀI VIẾT NÀO</h3>
							</div>
						@endif	
							<span style="float:right; width: 100%;">
							<div class="pagination dark" style="float: right;">
								@if(count($papers) > 0)
									{{ $papers->links() }}
								@endif
							</div>
							</span>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection

			