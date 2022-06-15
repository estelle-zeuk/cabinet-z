@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')

	<div class="page-title-area title-bg-one">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
				<div class="title-content">
						<h2>À propos de nous</h2>
						<ul>
							<a href="{{mob_route('welcome')}}">Acceuil</a>
								<li><span>À propos de nous</span></li>
						</ul>
				</div>
				</div>
			</div>
		</div>
	</div>

	@include('extension.about-us')

	<section class="features-area two pt-100 pb-70">
	<div class="features-shape">
	<img src="{{asset('frontend/images/features-shape1.png')}}" alt="Shape">
	<img src="{{asset('frontend/images/features-shape2.png')}}" alt="Shape">
	</div>
	<div class="container">
	<div class="section-title">
	<div class="top">
	<span class="top-title">{!! __('Pourquoi nous choisir') !!}</span>
	<span class="sub-title">{!! __('Pourquoi nous choisir') !!}</span>
	</div>
	<h2>{!! __('Votre vue notre priorité…') !!}</h2>
	</div>
	<div class="row">
	<div class="col-sm-6 col-lg-3">
	<div class="features-item">
	<span>01</span>
	<i class="flaticon-doctor"></i>
	<h3>
	<a href="service-details.html">Qualified Doctors</a>
	</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	<a class="features-btn" href="service-details.html">View Details</a>
	</div>
	</div>
	 <div class="col-sm-6 col-lg-3">
	<div class="features-item">
	<span>02</span>
	<i class="flaticon-view"></i>
	<h3>
	<a href="service-details.html">Eye Examination</a>
	</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	<a class="features-btn" href="service-details.html">View Details</a>
	</div>
	</div>
	<div class="col-sm-6 col-lg-3">
	<div class="features-item">
	<span>03</span>
	<i class="flaticon-eye-1"></i>
	<h3>
	<a href="service-details.html">Contact Lenses</a>
	</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	<a class="features-btn" href="service-details.html">View Details</a>
	</div>
	</div>
	<div class="col-sm-6 col-lg-3">
	<div class="features-item">
	<span>04</span>
	<i class="flaticon-laser"></i>
	<h3>
	<a href="service-details.html">Laser Eye Correction</a>
	</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	<a class="features-btn" href="service-details.html">View Details</a>
	</div>
	</div>
	</div>
	</div>
	</section>


	<section class="services-area four pt-100 pb-70">
		<div class="container">
		<div class="section-title">
		<div class="top">
			<span class="top-title">{!! __('Nos Services') !!}</span>
		</div>
		<h2>{!! __('Nos Services') !!}</h2>
			<p>Des services divers et variés sont à votre portée</p>
		</div>
			@include('extension.service')
		</div>
	</section>
	
@endsection
