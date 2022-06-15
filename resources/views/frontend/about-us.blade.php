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
					<h2>A propos de nous</h2>
					<ul>
						<li>
							<a href="{{mob_route('welcome')}}">Accueil</a>
						</li>
						<li>
							<span>Notre combat</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>


	<section class="team-area pt-100">
		<div class="container">
			<section class="work-area faq-area pb-70 wow fadeInUp " data-wow-duration="3s" style="background-color: white;">
				<div class="container">
					<div class="row align-items-center">
						<div class="work-content text-justify">
							<p>La Fédération 1 Million de Marcheurs souhaite permettre à chaque citoyen
								attaché aux valeurs humanistes et républicaines de trouver sa place au
								sein de la future majorité présidentielle. Les Associations, les groupes, les
								organisations, les Citoyens ……partageant les mêmes valeurs que nous,
								peuvent rejoindre la Fédération 1 Million de Marcheurs.</p>
							<p>Attaché à la représentation nationale, au renforcement des valeurs
								sociales au sein de la majorité, Nous favorisons le progrès,
								l’entreprenariat, l’économie solidaire, l’écologie, le développement
								durable… pour le bien-être de nos concitoyens. Avec la majorité, les
								associations, les citoyens, ...nous poursuivons les efforts pour soutenir
								nos entreprises en les permettant d’être plus innovantes, de rester
								implantées en France, de créer des emplois pour les jeunes et les
								personnes en recherche d’emploi.</p>
							<p>Nos idéaux sont l’économie solidaire, favoriser la liberté d’entreprise,
								l&#39;écologie et le développement durable…</p>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
@endsection
