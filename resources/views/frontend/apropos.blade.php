@extends('layouts.frontend.app')
@section('title','A Propos de nous')
@section('content')
	<div class="page-title-area title-bg-one">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
				<div class="title-content">
						<h2>À propos de nous</h2>
						<ul>
							<a href="{{mob_route('welcome')}}">{!! __('Accueil') !!}</a>
								<li><span>{!! __('À propos de nous') !!}</span></li>
						</ul>
				</div>
				</div>
			</div>
		</div>
	</div>

@endsection
