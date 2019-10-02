@extends('master')

@section('main-page')
	<!-- Title page -->
	<section id="title-sectiion" class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/test_images/about/bg-02.jpg') }}')">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-75">
		<div class="container">
			<div class="row p-b-75">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Câu chuyện của chúng tôi
						</h3>

						<p class="stext-113 cl6 p-b-26">
							@foreach($header_data['company_info'] as $company)
								{{ $company->description }}
							@endforeach
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							@foreach($header_data['company_info'] as $company)
								<img src="{{ url("$company->img") }}" alt="IMG">
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
