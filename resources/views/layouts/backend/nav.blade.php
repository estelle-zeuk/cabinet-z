<!-- partial:partials/_horizontal-navbar.html -->
<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
    <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top">
                <a class="navbar-brand brand-logo" href="{{mob_route('welcome')}}"><img style="height: 65px" src="{{asset('frontend/images/logo-default-slim-dark.png')}}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{mob_route('welcome')}}"><img style="height: 65px"  src="{{asset('frontend/images/apple-touch-icon.png')}}" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right mr-0">
                    <li class="dropdown">
                        <a href="#" style="color: white !important;" class="dropdown-toggle" data-toggle="dropdown">
                            {{ config('languages')[App::getLocale()] }}
                        </a>
                        <ul class="dropdown-menu" style="background-color: transparent; min-width: 4rem !important;">
                            @foreach (config('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a style="color: white !important;" href="{{ mob_route('lang.switch', $lang) }}" class=" ZoomIn animated">
                                            {{ $language }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-bell">4</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications
                                </p>
                                <span class="badge badge-pill badge-inverse-info float-right">View all</span>
                            </a>
                            {{--<div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-success">
                                        <i class="icon-exclamation mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-warning">
                                        <i class="icon-bubble mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-info">
                                        <i class="icon-user-following mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        2 days ago
                                    </p>
                                </div>
                            </a>--}}
                        </div>
                    </li>
                    @if(Auth::user())
                    <li class="nav-item dropdown nav-profile">
                            <form id="logout-form" action="{{ mob_route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a  class="nav-link dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <span class="nav-profile-text">{{__('message.welcome')}} {{Auth::user()->name}}! </span>
                                    <img src="{{mob_url('frontend/images/celeste.jpg')}}" class="rounded-circle" alt="profile"/>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <a href="{{mob_route('profile')}}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-inverse-success">
                                            <i class="icon-user mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal text-dark mb-1">
                                            Mon profile
                                        </h6>
                                    </div>
                                </a>
                              <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" class="nav-link" href="{{ mob_route('logout') }}"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-inverse-info">
                                            <i class="icon-power mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal text-dark mb-1">
                                            Déconnexion
                                        </h6>
                                    </div>

                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu text-white"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="nav-bottom">
        <div class="container">
            <ul class="nav page-navigation col-lg-12 col-md-12">
                <li class="nav-item">
                    <a href="{{mob_route('welcome')}}" class="nav-link" target="_blank"><i class="link-icon icon-home"></i><span class="menu-title">{{__('menu.go-to-site')}}</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{mob_route('dashboard')}}" class="nav-link"><i class="link-icon icon-screen-desktop"></i><span class="menu-title">{{__('menu.dashboard')}}</span></a>
                </li>
                @if(auth()->user()->role == 0)
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="link-icon icon-equalizer"></i><span class="menu-title">{{__('menu.activity-management')}}</span><i class="menu-arrow"></i></a>
                    <div class="submenu">
                        <ul class="submenu-item" style="list-style-type: none !important;">
                            <li><a class="nav-link" href="{{mob_route('news.index')}}">{{__('Gestion des publications')}}</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="nav-link" href="{{mob_route('service.index')}}">{{__('Gestion des services')}}</a></li>
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="link-icon icon-equalizer"></i><span class="menu-title">{{__('Gestion du magasin')}}</span><i class="menu-arrow"></i></a>
                    <div class="submenu">
                        <ul class="submenu-item" style="list-style-type: none !important;">
                            <li><a class="nav-link" href="{{mob_route('product.index')}}">{{__('Gestion des produits')}}</a></li>
                        </ul>
                    </div>
                </li>
                @if(auth()->user()->role == 0)
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="link-icon icon-settings"></i><span class="menu-title">{{__('menu.general-settings')}}</span><i class="menu-arrow"></i></a>
                    <div class="submenu">
                        <ul style="list-style-type: none !important;">
                            <li><a class="nav-link" href="{{mob_route('general.configuration')}}">{{__('Gestion de mes détails')}}</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="nav-link" href="{{mob_route('team.index')}}">{{__('menu.team-management')}}</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="nav-link" href="{{mob_route('faq.index')}}">{{__('menu.faq-management')}}</a></li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
