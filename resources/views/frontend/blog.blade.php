@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')


	<div class="page-title-area title-bg-three">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="title-content">
						<h2>{{__('Actualités récentes')}}</h2>
						<ul>
							<li>
								<a href="{{mob_route('welcome')}}">{!! __('Accueil') !!}</a>
							</li>
							<li>
								<span>{!! __('Actualités') !!}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<section class="blog-area ptb-100">
		<div class="container">
			<div class="section-title">
				<div class="top">
					<span class="top-title">{!! __('Actualités récentes') !!}</span>
					<span class="sub-title">{!! __('Notre actualité') !!}</span>
				</div>
				<h2>{!! __('Suivez les différentes actualités de VISION PLUS') !!}</h2>
			</div>
			<div class="row justify-content-center">
				@foreach(news() as $news)
					<div class="col-lg-4 col-sm-6">
						<div class="blog-item">
							<div class="top">
								<a href="{{mob_route('blog.detail',$news->code)}}">
									<img src="{{asset('frontend/images/'.$news->image)}}" alt="Blog">
								</a>
							</div>
							<div class="bottom">
								<h3>
									<a href="{{mob_route('my.news',$news->code)}}">{{$news->title_fr}}</a>
								</h3>
								<p>{{$news->summary_fr}}</p>
								<ul>
									<li>
										<span>Publié le : {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y')}}</span>
									</li>
									<li style="display: contents;">
										<a href="{{mob_route('my.news',$news->code)}}" class="btn btn-primary animate__animated animate__heartBeat" style="background-color: #3d2b9b !important; color: #fff;">Lire PLus</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		{{--	<div class="pagination-area">
				<ul>
					<li>
						<a href="#" target="_blank">Prev</a>
					</li>
					<li>
						<a class="active" href="#" target="_blank">1</a>
					</li>
					<li>
						<a href="#" target="_blank">2</a>
					</li>
					<li>
						<a href="#" target="_blank">3</a>
					</li>
					<li>
						<a href="#" target="_blank">Next</a>
					</li>
				</ul>
			</div>--}}
		</div>
	</section>

@endsection
