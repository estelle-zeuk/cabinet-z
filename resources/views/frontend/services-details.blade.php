@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')


	<div class="page-title-area title-bg-three">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="title-content">
						<h2>{!! $serviceDetails->title_fr !!}</h2>
						<ul>
							<li>
								<a href="{{mob_route('welcome')}}">Acceuil</a>
							</li>
							<li>
								<span>{!! __('Détails du service') !!}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="service-details-area ptb-100">
		<x-alert/>
		<div class="container">
			<div class="row col-lg-12">
				<div class="col-lg-8">
					<div class="details-item">
						<img src="{{asset('frontend/images/services/details1.jpg')}}" alt="Details">
						<h2>{{$serviceDetails->title_fr}}</h2>
						<div class="appointment-content">
							<h3>{{__('Prenez rendez-vous')}}</h3>
							<p>{{__('N\'hésitez pas à contacter notre sympathique personnel de réception pour toute question générale ou médicale. Nos médecins recevront ou retourneront tout appel urgent.')}}</p>
							<form method="POST" action="{{route('appointment.store')}}" id="appointment">
								@csrf
								<input type="hidden" name="source" value="0">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="name" placeholder="{{__('Nom complet')}}" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="{{__('Contact')}}" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="subject" placeholder="{{__('Objet de la demande')}}" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="datetime-local" class="form-control" name="date" placeholder="Date de RDV" required>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<textarea id="your-message" name="message" rows="8" class="form-control" placeholder="Write Message" required></textarea>
										</div>
									</div>
									<div class="col-lg-12">
										<button type="submit" class="btn common-btn">
											Envoyez la demande
											<span class="one"></span>
											<span class="two"></span>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="widget-area">
						<div class="categories widget-item">
							<h3>{!! __('D\'autres Services') !!}</h3>
							<ul>
								@foreach(services() as $service)
									@if($service->code != $serviceDetails->code)
										<li>
											<a href="{!! mob_route('services.detail',$service->code) !!}">{!! $service->title_fr !!}</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="common-doctor-contact widget-item">
							<div class="inner" style="font-size: 24px;">
								<i class='bx bxs-phone-call'></i>
								<a href="tel:+237{!!companyInfo()->phone!!}"  style="font-size: 24px;">(+237) {!!companyInfo()->phone!!}</a>
								<a href="tel:+237 {!!companyInfo()->phone2!!}"  style="font-size: 24px;">(+237) {!!companyInfo()->phone2!!}</a>
								<a href="tel: (+237) {!!companyInfo()->phone2!!}"  style="font-size: 24px;">(+237) {!!'222 25 14 24'!!}</a>
							</div>
							<h4>{!! __('Pour appel d\'urgence') !!}</h4>
							<p>{!! __('Pour les appels d\'urgence, veuillez appeler les numéros ci-dessus ou envoyez-nous un message via le formulaire ci-dessous') !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
