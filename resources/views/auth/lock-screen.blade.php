<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.housekey-html.themeseason.com/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 00:34:11 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lock Screen</title>
  <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/favicon.ico')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{asset('frontend/css/libs/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/libs/material-components-web.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/skins/blue.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
</head>
<body class="mdc-theme--background">
<div class="spinner-wrapper" id="preloader">
  <div class="spinner-container">
    <div class="spinner-outer">
      <div class="spinner">
        <div class="left mask">
          <div class="plane"></div>
        </div>
        <div class="top mask">
          <div class="plane"></div>
        </div>
        <div class="right mask">
          <div class="plane"></div>
        </div>
        <div class="triangle">
          <div class="triangle-plane"></div>
        </div>
        <div class="top-left mask">
          <div class="plane"></div>
        </div>
        <div class="top-right mask">
          <div class="plane"></div>
        </div>
      </div>
      <p class="spinner-text">CLATECH</p>
    </div>
  </div>
</div>
<main class="h-100">
  <div class="column center-xs middle-xs h-100 p-3 lock-screen">
    @if (Session::get('status') == 'danger')
      <div class="" style="/*padding-top: 50px; */text-align: center;">
        <strong>{{Session::get('message')}}</strong>
      </div>
    @endif
    {!! Form::open(['route' => 'unlock.screen', 'class' => 'row center-xs middle-xs']) !!}
      <h3 class="name text-muted">{{$user->usename}}</h3>
      {{--<img src="{{asset('frontend/assets/images/profile/adam.jpg')}}" alt="user-image" class="mdc-elevation--z4">
      <input placeholder="Enter username" name="username" type="text">--}}

      <img src="{{asset('frontend/assets/images/profile/adam.jpg')}}" alt="user-image" class="mdc-elevation--z4">
      <input placeholder="Enter password" name="password" type="password" required>
      <button class="mdc-icon-button material-icons submit primary-color" type="submit">arrow_forward</button>
      <a href="{{mob_route('login')}}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary primary-color normal">
        Or sign in as a different user
      </a>
      {!! Form::close() !!}
    <p class="time"></p>
  </div>
</main>
<script src="{{asset('frontend/js/libs/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/libs/material-components-web.min.js')}}"></script>
<script src="{{asset('frontend/js/libs/swiper.min.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&amp;callback=initMap" async defer></script>
</body>

<!-- Mirrored from www.housekey-html.themeseason.com/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 00:34:11 GMT -->
</html>
