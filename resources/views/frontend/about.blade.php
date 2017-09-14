@extends('frontend.layouts.frontendapp')

@section('content')
<main class="main-content">
				<div class="page">
					<div class="container">
						<div class="col-md-10 col-md-offset-1">
							{!! $introduce->detail !!}
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection

			