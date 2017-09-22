@extends('frontend.layouts.frontendapp')

@section('content')
<main class="main-content">
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	@if(!empty($parentcat))
		<script>
            //set active parent cat
            document.getElementById("{{$parentcat->name}}").className='menu-item current-menu-item';
		</script>
	@endif
				<div class="page">
					<div class="container">
						<div class="filter-links filterable-nav">
							@if(count($categories) > 0)
								<select class="mobile-filter" id="CatSelect" onchange="selectChange();">
									@foreach($categories as $category)
										@if(Request::is('danhmuc/tieumuc/'.$category->id))
											<option value="{{ route('tieumuc', $category->id) }}" selected="selected">{{ $category->name }}</option>
										@else
											<option value="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</option>
										@endif
									@endforeach
								</select>
								<script type="text/javascript">
                                    function selectChange(){
                                        var id = document.getElementById("CatSelect").value;
                                        window.location=id;
                                    }
								</script>

								@foreach($categories as $category)
									@if(Request::is('danhmuc/'.$category->id_parent))
										@if($loop->first)
											<a class="current" href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
										@else
											<a href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
										@endif
									@else
										@if(Request::is('danhmuc/tieumuc/'.$category->id))
											<a class="current" href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
										@elseif(!$loop->first || !Request::is('danhmuc/tieumuc/'.$category->id))
											<a href="{{ route('tieumuc', $category->id) }}">{{ $category->name }}</a>
										@endif
									@endif
								@endforeach
							@endif
						</div>

						<div class="filterable-items">

							@if(count($papers)>0)
								@php ($i = 1)
								@foreach($papers as $paper)
									@if(!empty($paper->image))
										<div class="project-item">
											<figure class="featured-image">
												<img src="{{url('storage/images/'.$paper->image)}}" alt="#" class="open-slideshow" id="{{$i}}" height="200">
											</figure>
										</div>
										@php ($i = $i +1)
									@endif
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

			

  <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="slideshow-container">
		@if(count($papers)>0)
			@php ($i = 1)
			@foreach($papers as $paper)
				@if(!empty($paper->image))
					<div class="mySlides fade">
						<img src="{{url('storage/images/'.$paper->image)}}" alt="#" >
					</div>
				@endif
				@php ($i = $i + 1)
			@endforeach
		@endif

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
  </div>
	<script src="{{ URL::asset('js/public/furniture.js') }}"></script>
</div>
@endsection

			