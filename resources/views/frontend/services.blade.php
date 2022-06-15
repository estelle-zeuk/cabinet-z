@extends('layouts.frontend.app')
@section('title','Welcome')

@section('content')

  <div class="page-title-area title-bg-two">
  <div class="d-table">
   <div class="d-table-cell">
    <div class="container">
     <div class="title-content">
      <h2>{!! __('Services') !!}</h2>
      <ul>
       <li>
        <a href="{{mob_route('welcome')}}">{!! __('Accueil') !!}</a>
       </li>
       <li>
        <span>{!! __('Nos services') !!}</span>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>
 </div>
  <section class="services-area ptb-100">
  <div class="container">
   <div class="section-title">
    <div class="top">
     <span class="top-title">{!! __('Nos Services') !!}</span>
    </div>
    <h2>{!! __('Nos Services') !!}</h2>
    <p>Des services divers et variés sont à votre portée</p>
   </div>
   @include('extension.service')
  </div>
 </section>
@endsection
