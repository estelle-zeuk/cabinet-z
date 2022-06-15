@extends('layouts.frontend.app')
@section('title','Organisation')
@section('css')
	<style>
		.team-item .bottom {
			padding: 12px 19px 10px;
		}
		.page-title-area .title-item ul li:before {
			top: 15px!important;
			left: 86px!important;
		}
	</style>
	@endsection
@section('content')
	<div class="page-title-area title-bg-eleven">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="title-item">
					<h2>Le manifeste</h2>
					<ul>
						<li>
							<a href="{{mob_route('welcome')}}">Accueil</a>
						</li>
						<li>
							<span>Manifeste</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>
	<section class="team-area ptb-100 wow fadeInUp" data-wow-duration="3s">
		<div class="container">
			<iframe src ="@if(env('APP_ENV') == 'production') {{asset('public/frontend/manifeste.pdf')}} @else {{asset('frontend/manifeste.pdf')}} @endif" style="width:100%; height:900px;"></iframe>
		</div>
	</section>
@endsection
