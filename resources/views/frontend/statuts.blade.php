@extends('layouts.frontend.app')
@section('title','Statuts')

@section('content')
    <div class="page-title-area title-bg-thirteen">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>La Fédération 1 millions de marcheurs - Statuts</h2>
                        <ul>
                            <li>
                                <a href="{{mob_route('welcome')}}">Accueil</a>
                            </li>
                            <li>
                                <span>Statuts</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="team-area ptb-100 wow fadeInUp" data-wow-duration="3s">
        <div class="container">
            <iframe src ="@if(env('APP_ENV') == 'production') {{asset('public/frontend/statut_lf1mdm.pdf')}} @else {{asset('frontend/statut_lf1mdm.pdf')}} @endif" style="width:100%; height:900px;"></iframe>
        </div>
    </section>
@endsection
