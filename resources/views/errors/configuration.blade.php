<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/flare/template/pages/samples/error-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 14:24:13 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{env('APP_NAME')}} - {{__('titles.page-not-found')}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/favicon.ico')}}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h3>Configuration Message!</h3>
                <h3 class="font-weight-light">{{$message}}</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="{{url('/')}}">Back to home</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Copyright &copy; 2020  All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('backend/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('backend/js/template.js')}}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/flare/template/pages/samples/error-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 14:24:13 GMT -->
</html>
