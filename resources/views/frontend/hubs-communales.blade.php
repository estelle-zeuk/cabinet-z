@extends('layouts.frontend.app')
@section('title','Organisation')
@section('css')
	<style>
		.team-item .bottom {
			padding: 12px 19px 10px;
		}
		i.icofont-mail{
			font-size: xx-large;
		}
		.page-title-area .title-item ul li:before {
			top: 15px!important;
			left: 86px!important;
		}

		.avatar-initials {
			align-items: center;
			border-radius: 50%;
			display: flex;
			font-family: Gillsans,Roboto,Helvetica,sans-serif;
			font-style: italic;
			font-weight: 700;
			justify-content: center;
			overflow: hidden;
		}

		.avatar--small {
			font-size: 16px;
			height: 48px;
			min-width: 48px;
			width: 48px;
		}

		.avatar--style-01 {
			background-color: #f6f6f6;
			color: #2abaff;
		}

		@media (max-width: 1000px){
			.committee__aside .avatar-initials {
				background-color: #fff;
			}
		}
		.committed-count{
			margin-left: -4px !important;
			padding-right: 0;
			margin-top: 13px;
		}

		.search__bar {
			background: #2abaff;
			display: flex;
			justify-content: space-between;
			margin-bottom: 40px;
			margin-top: 15px;
		}
	</style>
	@endsection
@section('content')
	<div class="page-title-area title-bg-eleven">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="title-item">
					<h2>Hubs Communales</h2>
					<ul>
						<li>
							<a href="{{mob_route('welcome')}}">Accueil</a>
						</li>
						<li>
							<span>Hubs Communales</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>

	<section class="team-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<div class="section-title text-center wow fadeInUp2 animated mt-30"
						 data-wow-delay='.1s'>
						<a href="{{route('hub-communale.create')}}" class="btn common-btn mx-auto wow fadeInUp2  animated submit-button" data-wow-delay=".4s" style="width: 40%; height: 134%; border-radius: 0px;">
							Créer un hub communale
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Jenas handar</h3>
								<span>Nom hub communale</span>
							</div>
						</div>
						<hr>
						<div class="bottom">
							<div class="row col-12">
								<div class="input-btn col-7 committed-count">
									<a href="" class="theme_btn theme_btn_bg large_btn" style="border-radius: 0;">En savoir plus</a>
								</div>
								<div class="col-5 committed-count">
									<svg width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M18.0134228,9.80130719 C18.9288591,8.74901961 19.4899329,7.39607843 19.4899329,5.89281046 C19.4899329,2.64575163 16.8912752,0 13.7020134,0 C11.6348993,0 9.80402685,1.1124183 8.8,2.79607843 C8.62281879,2.76601307 8.44563758,2.76601307 8.29798658,2.76601307 C5.10872483,2.76601307 2.51006711,5.41176471 2.51006711,8.65882353 C2.51006711,10.1620915 3.07114094,11.5150327 3.98657718,12.5673203 C1.65369128,13.5895425 0,15.9647059 0,18.7006536 L0,22.248366 C0,22.669281 0.324832215,23 0.738255034,23 L15.8281879,23 C16.2416107,23 16.566443,22.669281 16.566443,22.248366 L16.566443,20.2339869 L21.261745,20.2339869 C21.6751678,20.2339869 22,19.903268 22,19.4823529 L22,15.9346405 C22,13.1686275 20.3463087,10.8235294 18.0134228,9.80130719 Z M20.5234899,18.730719 L16.566443,18.730719 L16.566443,18.7006536 C16.566443,15.9647059 14.9127517,13.5895425 12.5798658,12.5673203 C12.7865772,12.3267974 12.9932886,12.0562092 13.1704698,11.7555556 C13.347651,11.7856209 13.5248322,11.7856209 13.6724832,11.7856209 C14.7651007,11.7856209 15.7986577,11.454902 16.6550336,10.9137255 C18.8697987,11.4849673 20.4939597,13.4993464 20.4939597,15.9045752 L20.4939597,18.730719 L20.5234899,18.730719 Z M1.44697987,21.4666667 L1.44697987,18.6705882 C1.44697987,16.2653595 3.07114094,14.220915 5.28590604,13.6797386 C6.17181208,14.220915 7.17583893,14.551634 8.26845638,14.551634 C9.36107383,14.551634 10.3946309,14.220915 11.2510067,13.6797386 C13.4657718,14.2509804 15.0899329,16.2653595 15.0899329,18.6705882 L15.0899329,21.4666667 L1.44697987,21.4666667 Z M3.95704698,8.62875817 C3.95704698,6.19346405 5.90604027,4.23921569 8.26845638,4.23921569 C10.6604027,4.23921569 12.5798658,6.22352941 12.5798658,8.62875817 C12.5798658,11.0339869 10.6308725,13.0183007 8.26845638,13.0183007 C5.87651007,13.048366 3.95704698,11.0640523 3.95704698,8.62875817 Z M18.0134228,5.89281046 C18.0134228,8.26797386 16.1530201,10.1921569 13.8496644,10.2823529 C13.9973154,9.77124183 14.085906,9.23006536 14.085906,8.65882353 C14.085906,6.13333333 12.5208054,3.99869281 10.3651007,3.15686275 C11.1624161,2.16470588 12.3731544,1.50326797 13.7315436,1.50326797 C16.0644295,1.50326797 18.0134228,3.45751634 18.0134228,5.89281046 Z" id="participants" stroke="none" fill="#000000" fill-rule="evenodd"></path></svg>
									923 adhérents
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
