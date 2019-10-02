@extends('master')

@section('main-page')
	<!-- Title page -->
	<section id="title-sectiion" class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/test_images/about/bg-01.jpg') }}')">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Để lại lời nhắn cho chúng tôi
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input id="message-email-input" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email của bạn">
							<img class="how-pos4 pointer-none" src="{{ url('/images/icons/icon-email.png') }}" alt="ICON">
						</div>

						<div class="bor8 m-b-5">
							<textarea id="message-content-input" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Chúng tôi có thể giúp gì?" style="resize: none"></textarea>
						</div>

						<div class="text-center">
							<p id="message-invalid" style="font-size: 14px; color: #717fe0"></p>
						</div>

						<button id="send-message-btn" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-t-20">
							Gửi
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					@foreach($header_data['company_info'] as $company)
						@if(!empty($company->address))
							<div class="flex-w w-full p-b-42">
								<span class="fs-18 cl5 txt-center size-211">
									<span class="lnr lnr-map-marker"></span>
								</span>

								<div class="size-212 p-t-2">
									<span class="mtext-110 cl2">
										Địa chỉ
									</span>

									<p class="stext-115 cl6 size-213 p-t-18">
										{{ $company->address }}
									</p>
								</div>
							</div>
						@endif

						@if(!empty($company->phone))
							<div class="flex-w w-full p-b-42">
								<span class="fs-18 cl5 txt-center size-211">
									<span class="lnr lnr-phone-handset"></span>
								</span>

								<div class="size-212 p-t-2">
									<span class="mtext-110 cl2">
										Liên hệ
									</span>

									<p class="stext-115 cl1 size-213 p-t-18">
										{{ $company->phone }}
									</p>
								</div>
							</div>
						@endif

						@if(!empty($company->email))
							<div class="flex-w w-full">
								<span class="fs-18 cl5 txt-center size-211">
									<span class="lnr lnr-envelope"></span>
								</span>

								<div class="size-212 p-t-2">
									<span class="mtext-110 cl2">
										Email
									</span>

									<p class="stext-115 cl1 size-213 p-t-18">
										{{ $company->email }}
									</p>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
