@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')

    <div class="page-title-area title-bg-four" style="height: 200px">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>{!! __('Détails de l\'actualité') !!}</h2>
                        <ul>
                            <li>
                                <a href="{{mob_url('actualite')}}">{!! __('Actualités') !!}</a>
                            </li>
                            <li>
                                <span>{!! __('Détails actualité') !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <h2>{!! $info->title_fr !!}</h2>
                        <div class="details-img">
                            <img src="{{asset('frontend/images/'. $info->image)}}" alt="Shop">
                        </div>
                        <p>{!! $info->description_fr !!}</p>
                        <ul>
                            <li>
                                <span>Publié le : {{ \Carbon\Carbon::parse($info->created_at)->format('d F Y')}}</span>
                            </li>
                        </ul>

                        <div class="tags">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="right">
                                        <ul>
                                            <li>
                                                <span>{!! __('Partager') !!} :</span>
                                            </li>
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=#{!! mob_route('my.news',$info->code) !!}" target="_blank">
                                                    <i class='bx bxl-facebook'></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank">
                                                    <i class='bx bxl-twitter'></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="post widget-item">
                            <h3>{!! __('Quelques actualités') !!}</h3>
                            @foreach(news() as $news)
                                @if($news->code != $info->code)
                                    <div class="inner">
                                        <ul class="align-items-center">
                                            <li>
                                                <img src="{{asset('frontend/images/blog/thumb1.jpg')}}" alt="Details">
                                            </li>
                                            <li>
                                                <a href="{!! mob_route('my.news',$news->code) !!}">{!! $news->title_fr !!}</a>
                                                <span>Publié le : {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y')}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="common-doctor-contact widget-item">
                            <div class="inner">
                                <i class='bx bxs-phone-call'></i>
                                <a href="tel:+237{!!companyInfo()->phone!!}" style="font-size:24px;">+237 {!!companyInfo()->phone!!}</a>
                                <a href="tel:+237 {!!companyInfo()->phone2!!}" style="font-size:24px;">+237 {!!companyInfo()->phone2!!}</a>
                                <a href="tel: +237 222 25 14 24" style="font-size:24px;">+237 222 25 14 24</a>
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
