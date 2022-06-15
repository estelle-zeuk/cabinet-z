@extends('layouts.frontend.app')
@section('title','Contact')

@section('content')


	<div class="page-title-area title-bg-four">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="title-content">
						<h2>Contactez Nous</h2>
						<ul>
							<li>
								<a href="{{mob_route('welcome')}}">Acceuil</a>
							</li>
							<li>
								<span>Contact</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="contact-info-area pt-100 pb-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-sm-6">
					<div class="contact-info-item">
						<i class='bx bx-phone-call'></i>
						<h3> Contacts</h3>
						<a href="tel:+237{{companyInfo()->phone}}">+237 {{companyInfo()->phone}}</a>
						<a href="tel:+237{{companyInfo()->phone2}}">+237 {{companyInfo()->phone2}}</a>
						<a href="tel:+237 222 25 14 24">+237 222 25 14 24</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="contact-info-item">
						<i class='bx bx-mail-send'></i>
						<h3>Email Address</h3>
						<a href="mailto:{{companyInfo()->email}}>">{{companyInfo()->email}}</a>
						<a href="mailto:{{companyInfo()->hr_email}}">{{companyInfo()->hr_email}}</a>
                        <br>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="contact-info-item">
						<i class='bx bx-location-plus'></i>
						<h3>Location</h3>
						<a href="{!! companyInfo()->link !!}" target="_blank">{!! str_replace('<br>',' ',companyInfo()->address) !!}, Cameroun</a>
                        <br>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<div class="contact-area pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="map-item">
						{!! companyInfo()->location !!}
					</div>
				<div class="col-lg-6">
					{!! Form::open(['route' => ['enquiry'], 'class' => '','id' =>'contactForm','method' => 'POST']) !!}
						<h3>{!! __('En contact avec nous!') !!}</h3>
						<div class="row">
							<div class="col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Nom complet" required data-error="Veuillez entrer votre nom">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Veuillez entrer votre email">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="phone" id="phone_number" placeholder="Téléphone" required data-error="Veuillez entrer votre numéro de téléphone" class="form-control">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Objet" required data-error="Veuillez saisir l'objet">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Écrire un message" required data-error="Écrire un message"></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="text-center">
									<button type="submit" class="btn common-btn">
										<span class="one"></span>
										<span class="two"></span>
                                        {!! __('Envoyez le message') !!}
									</button>
									<div id="loadSubmit" class="h3 text-center" style="display: none;"> {!! __('Veuillez patienter....') !!}</div>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection
