@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')


	<div class="page-title-area title-bg-three">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="title-content">
						<h2>Vision Plus Boutique</h2>
						<ul>
							<li>
								<a href="{{mob_route('welcome')}}">Acceuil</a>
							</li>
							<li>
								<span>Notre Boutique</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="shop-area ptb-100">
		<div class="container">
		<div class="section-title">
		<div class="top">
		<span class="top-title">Nos Produits</span>
		</div>
		<h2>Trouvez votre produit et passez votre commande</h2>
			<p style="text-align:center; font-size: 20px; font-weight:bold;">Pour passer vos commandes, veuillez contacter l’entreprise aux coordonnées ci-après :
				-	Tél : +237 {!!companyInfo()->phone!!}
				+237 {!!companyInfo()->phone2!!}
				+ 237 222 25 14 24
			</p>
		</div>
		<div class="row popup-gallery">
			@foreach($products as $product)
				@if($product->is_published  == 1)
					<div class="col-sm-6 col-lg-4">
					<div class="shop-item">
						<h4>Nouveau</h4>
						<div class="top" style="padding: 0 !important;">
							<img src="{{asset('frontend/images/shop/'. json_decode($product->image)[0])}}" alt="Shop">
							<ul>
										<li>
											<a class="popup" href="{{asset('frontend/images/shop/'.json_decode($product->image)[0])}}">
												<i class='flaticon-view'></i>
											</a>
										</li>
							</ul>
						</div>
						<div class="bottom">
							<h3>
								<a href="{{route('product.details', $product->id)}}">@if($product->category == 0){!! __('Voir plus') !!} @else {!! $product->name !!} @endif</a>
							</h3>
						</div>
					</div>
				</div>
				@endif
			@endforeach
		</div>
	</div>
	</section>

@endsection
