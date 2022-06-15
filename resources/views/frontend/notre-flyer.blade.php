@extends('layouts.frontend.app')
@section('title','Cart')

@section('content')

<div class="page-title-area title-bg-three">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="title-content">
					<h2>Notre Flyer</h2>
					<ul>
						<li><a href="{{mob_route('welcome')}}">Acceuil</a></li>
						<li><span>Flyer</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="shop-area ptb-100">
	<div class="container">
		<iframe src="{{asset('frontend/visionPLusFlyer.pdf')}}" frameborder="0"></iframe>
	</div>
</section>

@endsection
