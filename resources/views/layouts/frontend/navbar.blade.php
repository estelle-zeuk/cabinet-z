<div class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="left">
					<ul>
						<li>
							<i class="icofont-location-pin"></i>
							<a href="#">322 rue du Boulidou 34980 Saint Clément de Rivière</a>
						</li>
						<li>
							<i class="icofont-ui-call"></i>
							<a href="tel:+0123456987">+33 075-392-85-71</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="right">
					<ul>
						<li>
							<span>Suivez nous:</span>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="icofont-facebook"></i>
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="icofont-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="icofont-youtube-play"></i>
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="icofont-instagram"></i>
							</a>
						</li>
					</ul>
				{{--	<div class="language">
						<select>
							<option>English</option>
							<option>العربيّة</option>
							<option>Deutsch</option>
							<option>Português</option>
						</select>
					</div>
					<div class="header-search">
						<i id="search-btn" class="icofont-search-2"></i>
						<div id="search-overlay" class="block">
							<div class="centered">
								<div id="search-box">
									<i id="close-btn" class="icofont-close"></i>
									<form>
										<input type="text" class="form-control" placeholder="Search..." />
										<button type="submit" class="btn">Search</button>
									</form>
								</div>
							</div>
						</div>
					</div>--}}
				</div>
			</div>
		</div>
	</div>
</div>


<div class="navbar-area sticky-top">

	<div class="mobile-nav">
		<a href="{{mob_route('welcome')}}" class="logo">
			<img src="{{asset('frontend/assets/img/1mdm-logo.jpeg')}}" alt="Logo">
		</a>
	</div>

	<div class="main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="{{mob_route('welcome')}}">
					<img src="{{asset('frontend/assets/img/1mdm-logo.jpeg')}}" alt="Logo" style="width: 100px; height: 100px;">
				</a>
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav" id="myNAV">
						<li class="nav-item ">
							<a href="{{mob_route('welcome')}}" class="nav-link @if(Request::segment(1) == null) active @endif ">Accueil</a>
						</li>
						<li class="nav-item ">
							<a href="{{mob_route('manifeste')}}" class="nav-link @if(Request::segment(1) == 'manifeste') active @endif ">Manifeste</a>
						</li>
						<li class="nav-item ">
							<a href="{{mob_route('a-propos')}}" class="nav-link @if(Request::segment(1) == 'a-propos') active @endif ">A propos de nous</a>
						</li>
						{{--<li class="nav-item">
							<a href="{{mob_route('organisation')}}" class="nav-link  @if(Request::segment(1) == 'organisation') active @endif">Organisation</a>
						</li>--}}
						<li class="nav-item ">
							<a href="{{mob_route('join-us')}}" class="nav-link @if(Request::segment(1) == 'adherer') active @endif">Adhérer</a>
						</li>
						<li class="nav-item">
							<a href="{{mob_route('contact-us')}}" class="nav-link @if(Request::segment(1) == 'contactez-nous') active @endif">Contact</a>
						</li>
						{{--<li class="nav-item d-block d-sm-none d-md-block d-lg-none">
							<div class="">
								<a class="donate-btn" href="{{mob_route('donate')}}">
									Faire un don
								</a>
							</div>
						</li>--}}
					</ul>
					{{--<div class="side-nav d-none d-sm-block d-md-none d-lg-block">
						<a class="donate-btn" href="{{mob_route('donate')}}">
							Faire un don
						</a>
					</div>--}}
				</div>
			</nav>
		</div>
	</div>
</div>
