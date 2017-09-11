@extends('frontend.layouts.frontendapp')

@section('content')

			<main class="main-content">
				
				<div class="page">
					<div class="container">

						<div class="row">
							<div class="col-md-8">
								<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.074348047516!2d108.17941454989602!3d16.061631243854464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142190465ca898d%3A0xe88cd0cb8cd3cee0!2zNzggTmd1eeG7hW4gxJDDrG5oIFThu7F1LCBUaGFuaCBLaMOqLCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1503372508730" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>

								<div class="contact-detail">
									<address>
										<div class="contact-icon">
											<img src="images/icon-marker.png" class="icon">
										</div>
										<p><strong>Công ty TNHH Tư vấn thiết kế và Xây dựng Việt Vũ Long</strong> <br>78 Nguyễn Đình Tựu, Q. Thanh Khê, Tp Đà Nẵng</p>
									</address>
									<a href="javascript:void(0)" class="phone"><span class="contact-icon"><img src="images/icon-phone.png" class="icon"></span>0934 380 037</a>
									<a href="javascript:void(0)" class="email"><span class="contact-icon"><img src="images/icon-envelope.png" class="icon"></span>vietvulong@evita.com</a>
								</div>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<div class="contact-form">
									@if(Session::has('success'))
										<h3>{{ Session::get('success') }}</h3>
									@endif
									<h2 class="section-title">Liên hệ với chúng tôi</h2>

									<form method="POST" action="{{ route('contact.store') }}" id="contact">
										{{ csrf_field() }}
										<input type="text" name="hoten" placeholder="Họ và tên" value="" required >
										<input type="text" name="email" placeholder="Email.." value="">
										<input type="text" name="sodienthoai" placeholder="Số điện thoại" value="">
										<textarea name="noidung" placeholder="Nội dung"></textarea>
										<p class="text-right">
											<button type="submit">Gửi tin nhắn</button>
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->
@endsection