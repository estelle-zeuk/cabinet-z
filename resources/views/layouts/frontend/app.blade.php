<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | LF1MDEM</title>
    <meta name="description" content="La Fédération 1 Million de Marcheurs est un regroupement de plusieurs personnes, les association, les collectives, les entreprises,… tous soutenant le progres, le bien vivre ensemble quelques soit nos origines, religion,…. Avec l’Humanisme comme valeur fondamentale, la Fédération 1 Million de Marcheurs défend avec force et conviction la préservation des Droits de l’Homme et du Citoyen face aux discours ségrégationnistes et déclinistes, qui mettent en péril l’unité de la Nation">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{companyInfo()->keywords}}">
    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/1mdm-logo.jpeg')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/icofont.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/modal-video.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/lightbox.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <style>
        .text-tap{
           text-indent :2em;
        }
        body{
            color: black;
        }
        li{
            font-size: 22px;
        }
        p{
            font-size: 24px!important;
        }
        h5{
            font-size: 1.65rem;
        }
        h6{
            font-size: 1.35rem;
        }
        @media only screen and (max-width: 991px){
            .mean-container a.meanmenu-reveal span {
                margin-top: 45px;}
        }

    </style>
    @yield('css')
</head>
<body id="tcApp">

<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="pre-box-one">
                <div class="pre-box-two"></div>
            </div>
        </div>
    </div>
</div>


@include('layouts.frontend.navbar')


@yield('content')


@include('layouts.frontend.footer')


<div class="go-top">
    <i class="icofont-arrow-up"></i>
    <i class="icofont-arrow-up"></i>
</div>


<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/form-validator.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.meanmenu.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery-modal-video.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.appear.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script src="{{asset('custom/js/claCustom.js')}}"></script>
<script src="{{asset('frontend/assets/js/contact-form-script.js?v='.time())}}"></script>
<script>
    new WOW().init();
</script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        let submit_button = $('.submit-button'),danger_block = $('.danger-block'),success_block = $('.success-block');
        $('#contact-us-now').submit(function(e){
            e.preventDefault();
            let form = $(this);
            submit_button.text('Traitement encours. Veuillez Patienter....');
            submit_button.attr('disabled',true);
            ajaxSubmitForm(form).then(response => {
                success_block.show();
                submit_button.text('Rester informé(e)');
                submit_button.attr('disabled',false);
                form[0].reset();
            }).catch(error => {
                danger_block.show();
                submit_button.text('Rester informé(e)');
                submit_button.attr('disabled',false);
                console.log(error);
            });
        });
    });
</script>
@yield('js')
</body>

</html>
