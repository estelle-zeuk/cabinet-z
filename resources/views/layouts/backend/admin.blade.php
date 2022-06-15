<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/summernote/dist/summernote-bs4.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/offline-theme-slide.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('frontend/images/apple-touch-icon.png')}}" />
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="online" value="{{ __('message.online-message') }}">
    <input type="hidden" id="offline" value="{{ __('message.offline-message') }}">
    <input type="hidden" id="image-upload-url" value="{{ mob_route('upload.image') }}">
    <input type="hidden" id="delete-file-url" value="{{ mob_route('delete.file') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <style>

        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{mob_url('frontend/images/preloaders/5.gif')}}) center no-repeat #b7e8ba;
        }

        .loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{mob_url('frontend/images/preloaders/5.gif')}}) center no-repeat #ffeb007d;
        }
        .toast-info {
            background-color: #3276b1;
        }
    </style>
    @yield('css')
</head>

<body>

<div class="loading" style="display: none;" id="processing"></div>
<div class="container-scroller">
   @include('layouts.backend.nav')
   <!-- partial -->
       <div class="container-fluid page-body-wrapper">
           <div style="max-width: 1450px; padding-top: 130px; margin-right: auto; margin-left: auto;">
           <!-- content-wrapper begins -->
            @yield('content')
           <!-- content-wrapper ends -->

    <!-- including footer template begins-->
   @include('layouts.backend.footer')
   <!-- including footer template ends-->

           </div>
           <!-- main-panel ends -->
       </div>
       <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('backend/vendors/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/vendors/tinymce/themes/modern/theme.js')}}"></script>
<script src="{{asset('backend/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('backend/js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('backend/js/dashboard.js')}}"></script>
<script src="{{asset('backend/js/todolist.js')}}"></script>

{{--<script src="{{asset('backend/js/typeahead.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/select2.js') }}"></script>--}}
<script src="{{asset('backend/js/toastr.min.js') }}"></script>
<script src="{{asset('backend/js/toastDemo.js')}}"></script>
<script src="{{asset('js/sweetalert.js') }}"></script>
<script src="{{asset('js/share.js') }}"></script>
<script src="{{asset('js/fileinput.min.js') }}"></script>
<script src="{{asset('js/piexif.min.js') }}"></script>
<script src="{{asset('backend/js/file-upload.js')}}"></script>
<script src="{{asset('backend/js/formpickers.js')}}"></script>
<script src="{{asset('backend/js/form-repeater.js')}}"></script>
<script src="{{asset('backend/js/editorDemo.js?v='.time())}}"></script>
<script src="{{asset('backend/js/dropify.js')}}"></script>
{{--<script src="{{asset('frontend/js/custom.js')}}"></script>--}}
<script>
    // Wait for window load
    /*$(window).load(function() {
        // Animate loader off screen
        $(".loading").fadeOut("slow");
    });*/

    $(function () {
        $("#input-documents").fileinput({
            browseClass: "btn btn-primary btn-block",
            allowedFileExtensions: ["pdf"/*, "png", "gif"*/],
            showCaption: true,
            showRemove: false,
            showUpload: false
        });

        $("#input-images").fileinput({
            browseClass: "btn btn-primary btn-block",
            allowedFileExtensions: ["jpg", "png", "gif"],
            showCaption: true,
            showRemove: false,
            showUpload: false
        });

        $('.btn-kv').addClass('fa fa-eye');
    });
</script>
@yield('js')
<!-- End custom js for this page-->
</body>

<!-- Mirrored from www.urbanui.com/flare/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 14:20:23 GMT -->
</html>
