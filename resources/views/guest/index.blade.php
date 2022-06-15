@extends('layouts.app')

@section('title',__('titles.welcome'))
@section('description-keywords')
    <meta name="description" content="{{ __('page.description.welcome')}}">
    <meta name="keywords" content="{{ __('page.keywords.welcome') }}">
@endsection
{{--
@php dd(set_active_home(request()->path()),set_active(request()->path(),'more-services'),set_sub_active(request()->path(),'terms-conditions'));@endphp
--}}
@section('content')
    <div class="header-carousel offset-bottom">
        <div class="swiper-container h-100">
            <div class="swiper-wrapper h-100">
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{asset('frontend/assets/images/props/flat-1/1-big.jpg')}}">
                        <div class="swiper-lazy-preloader"></div>
                        <span class="d-none" data-slide-title="{{$companies[0]->service_name}}"></span>
                        <span class="d-none" data-slide-location="{{$companies[0]->address}}"></span>
                        <span class="d-none" data-slide-price="FROM XAF 300,000"></span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{asset('frontend/assets/images/props/house-1/5-big.jpg')}}">
                        <div class="swiper-lazy-preloader"></div>
                        <span class="d-none" data-slide-title="{{$companies[2]->service_name}}"></span>
                        <span class="d-none" data-slide-location="{{$companies[2]->address}}"></span>
                        <span class="d-none" data-slide-price="FROM XAF 500,000"></span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{asset('frontend/assets/images/props/office-2/6-big.jpg')}}">
                        <div class="swiper-lazy-preloader"></div>
                        <span class="d-none" data-slide-title="{{$companies[1]->service_name}}"></span>
                        <span class="d-none" data-slide-location="{{$companies[1]->address}}"></span>
                        <span class="d-none" data-slide-price="FROM XAF 100,000"></span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-item swiper-lazy" data-background="{{asset('frontend/assets/images/props/apartment/1-big.jpg')}}">
                        <div class="swiper-lazy-preloader"></div>
                        <span class="d-none" data-slide-title="{{$companies[2]->service_name}}"></span>
                        <span class="d-none" data-slide-location="{{$companies[2]->address}}"></span>
                        <span class="d-none" data-slide-price="FROM XAF 500,000"></span>
                    </div>
                </div>
            </div>
            <button class="swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span>
            </button>
            <button class="swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary">
                <span class="mdc-fab__ripple"></span>
                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span>
            </button>
            <div class="slide-info column center-xs middle-xs">
                <div id="active-slide-info" class="mdc-card p-4 column center-xs middle-xs">
                    <h1 class="slide-title">Title</h1>
                    <p class="location row center-xs middle-xs">
                        <i class="material-icons mat-icon-lg primary-color">location_on</i>
                        <span class="px-1">Location</span>
                    </p>
                    <a href="#" class="mdc-button mdc-button--raised price">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">price</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-3">
        <div class="theme-container">
            <div class="mdc-card main-content-header">
                <x-search-form/>
            </div>
            <div id="service-listing">
                <x-search-services :services="$services"/>
            </div>
        </div>
    </div>
     <div class="section default">
         <div class="px-3">
             <div class="theme-container">
                 <h1 class="section-title">{{__('message.home.our-mission')}}</h1>
                 <div class="mdc-card p-0 row o-hidden">
                     <div class="col-xs-12 col-lg-6 col-xl-6 p-3">
                         <div class="row">
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                 <i class="material-icons mat-icon-xlg primary-color">monetization_on</i>
                                 <h2 class="capitalize fw-600 mb-2">{{__('message.home.save-money')}}</h2>
                                 <p class="text-muted fw-500">{{__('message.home.save-money-description')}}.</p>
                             </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                 <i class="material-icons mat-icon-xlg primary-color">thumb_up</i>
                                 <h2 class="capitalize fw-600 mb-2">{{__('message.home.better-ideas')}}</h2>
                                 <p class="text-muted fw-500">{{__('message.home.better-ideas-description')}}.</p>
                             </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                 <i class="material-icons mat-icon-xlg primary-color">group</i>
                                 <h2 class="capitalize fw-600 mb-2">Collaboration</h2>
                                 <p class="text-muted fw-500">{{__('message.home.collaboration-description')}}.</p>
                             </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                 <i class="material-icons mat-icon-xlg primary-color">search</i>
                                 <h2 class="capitalize fw-600 mb-2">{{__('message.home.easy-to-find')}}</h2>
                                 <p class="text-muted fw-500">{{__('message.home.easy-to-find-description')}}.</p>
                             </div>
                         </div>
                     </div>
                     <div class="col-xs-12 col-lg-6 col-xl-6 p-0 d-none d-lg-flex d-xl-flex">
                         <img src="{{asset('frontend/assets/images/others/mission.jpg')}}" alt="mission" class="mw-100 d-block">
                     </div>
                 </div>

             </div>
         </div>
     </div>
     <div class="section mt-3">
         <div class="px-3">
             <div class="theme-container">
                 <h1 class="section-title">Our Services</h1>
                 <div class="services-wrapper row">
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">
                         <div class="mdc-card h-100 w-100 text-center middle-xs p-3">
                             <i class="material-icons mat-icon-xlg primary-color">location_on</i>
                             <h2 class="capitalize fw-600 my-3">Find places anywhere in the world</h2>
                             <p class="text-muted fw-500">{{__('message.location-description')}}.</p>
                         </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">
                         <div class="mdc-card h-100 w-100 text-center middle-xs p-3">
                             <i class="material-icons mat-icon-xlg primary-color">supervisor_account</i>
                             <h2 class="capitalize fw-600 my-3">We have wedding planners with experience</h2>
                             <p class="text-muted fw-500">{{__('message.organisation-experience')}}.</p>
                         </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">
                         <div class="mdc-card h-100 w-100 text-center middle-xs p-3">
                             <i class="material-icons mat-icon-xlg primary-color">home</i>
                             <h2 class="capitalize fw-600 my-3">Plan from home</h2>
                             <p class="text-muted fw-500">{{__('message.obtain-wedding-planning')}}.</p>
                         </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">
                         <div class="mdc-card h-100 w-100 text-center middle-xs p-3">
                             <i class="material-icons mat-icon-xlg primary-color">format_list_bulleted</i>
                             <h2 class="capitalize fw-600 my-3">With organisation account you can list services</h2>
                             <p class="text-muted fw-500">{{__('message.organisation-account')}}.</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @if($companies)
        <div class="section agents">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Meet wedding planners</h1>
                    <div class="agents-carousel">
                        <div class="swiper-container carousel-outer">
                            <div class="swiper-wrapper">
                                @foreach($companies as $company)
                                    <div class="swiper-slide">
                                        <div class="mdc-card o-hidden">
                                            <div>
                                                <img src="{{asset('frontend/assets/images/others/transparent-bg.png')}}" style="width: 100%" alt="slide image" data-src="{{asset('uploads/profile/logo/'.$company->logo)}}" class="swiper-lazy d-block mw-100">
                                                <div class="swiper-lazy-preloader"></div>
                                            </div>
                                            <div class="p-3">
                                                <h2 class="fw-600">{{$company->service_name}}</h2>
                                               {!! getServicesRatingByCompany($company->id) !!}
                                                <p class="mt-3 text-muted fw-500">{{$company->description_en}}.</p>
                                                <p class="row middle-xs"><i class="material-icons primary-color">location_on</i><span class="mx-2 text-muted fw-500">{{$company->address}}</span></p>
                                                <p class="row middle-xs"><i class="material-icons primary-color">email</i><a class="mx-2 text-muted fw-500" href="mailto:{{$company->email}}" style="text-decoration: none;">{{$company->email}}</a></p>
                                            <p class="row middle-xs"><i class="material-icons primary-color">call</i><a class="mx-2 text-muted fw-500" href="tel:{{$company->phone}}" style="text-decoration: none;">(+237) {{$company->phone}}</a></p>
                                                <div class="row pb-3">
                                                    <div class="divider"></div>
                                                </div>
                                                <div class="row between-xs middle-xs">
                                                    <div class="row start-xs middle-xs">
                                                        <a href="https://www.facebook.com/" target="blank" class="social-icon" title="facebook">
                                                            <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                                <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="https://twitter.com/" target="blank" class="social-icon" title="twitter">
                                                            <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                                <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="https://www.linkedin.com/" target="blank" class="social-icon" title="linkedin">
                                                            <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                                <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="https://instagram.com/" target="blank" class="social-icon" title="instagram">
                                                            <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                                <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="http://www.agent.com/" target="blank" class="social-icon" title="website">
                                                            <svg class="material-icons text-muted" viewBox="0 0 24 24">
                                                                <path d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <a href="{{mob_route('vendor.show',strtolower(str_replace(' ','-',$company->service_name)))}}" class="mdc-button">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">View Profile</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span>
                            </button>
                            <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary">
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span>
                            </button>
                        </div>
                    </div>
                    <div class="w-100 text-center mt-5">
                        <a href="javascript:void(0);" class="mdc-button mdc-button--raised">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">See more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
     @endif
    {{--@include('frontend.information.intro')--}}
    <x-price-plan/>
@endsection
@section('js')
    {{--<script>
        $(function () {

        });
    </script>--}}
@endsection
