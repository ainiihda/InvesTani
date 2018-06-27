@extends('layouts.tampilan')

@section('content')

<!-- SECTION -->
<div class="section" style="width:1800px; margin:0 auto;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Investasi</h3>
							</br></br></br>
							<h4>Kirim ke rekening </h4>
							<h2>101.00.98300.997</h2>
						</div>
						
						<a href="{{route('bukti')}}" class="primary-btn order-submit">Upload bukti pengiriman</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection