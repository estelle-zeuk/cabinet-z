@extends('layouts.frontend.app')
@section('title','Bienvenue')
@section('css')
    <style>
        .section-title h2 {
            font-size: 60px;
        }
        .work-area .work-content ul li h3 span {
            width: 40px;
            height: 40px;
            font-size: 21px;
            line-height: 43px;
        }
        .work-area .work-content ul li h3 {
            font-size: 29px;
            margin-bottom: 5px;
        }
        .contact-area #contactForm .form-group label {
            top: 15px;
            left: 9px;
            font-size: 24px;
        }
        .contact-area #contactForm .form-group .form-control {
            height: 75px;
        }
    </style>
@endsection
@section('content')
    <div class="contact-area" style="margin-top:130px; background-color: #063a796b; padding-top:5px; padding-bottom: 45px">
        <x-alert/>
        <div class="container">
            <form id="contactForm" action="{{route('enquiry')}}" method="post">
                @csrf
                <input type="hidden" name="newsletter" value="true">
                <h1 style="border-top: 2px solid black; border-bottom: 2px solid black; text-transform: uppercase;
                        padding-bottom: 15px; padding-top: 15px; color: white;font-size: 50px;">
                    Bienvenu(e)s à la Fédération 1 Million
                    de Marcheurs
                </h1>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name">
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom *" required data-error="Entrer votre nom">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="surname">
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Prénom *" required data-error="Entrer votre prénom">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="postal-code">
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="postal_code" id="postal-code" class="form-control" placeholder="Code postal *" required data-error="Entrer votre code postal">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Entrer votre adresse email *">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" style="color:white;">
                            <input type="checkbox" name="pdc" value="pdc" id="pdc" style="width: 21px;height: 21px; margin-right: 5px;" required data-error="Accepter les conditions">
                            <label for="pdc"></label>J'accepte la <a href="#">politique de confidentialité</a>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="alert alert-success alert-block success-block" style="text-align: center; display: none;">
                        <strong id="success-message">Contact enregistré avec succès!!!</strong>
                    </div>
                    <div class="alert alert-danger alert-block danger-block" style="text-align: center; display: none;">
                        <strong id="failure-message">Erreur lors d'enregistrement de contact</strong>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn common-btn mx-auto submit-button" style="width: 40%; height: 134%; border-radius: 0px;">
                            Rester informé(e)
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner-content">
                                <h1>AVEC VOUS</h1>
                                <p>Les marcheurs, Les citoyens, les Marconistes,
                                    Ensembles citoyens, La République En Marche,
                                    Horizons, Territoires des Progrès, En Commun, Agir…
                                    les JUREM, les JAM, La Démocratie Ensemble,
                                    L’inclusion en Marche, L’égalité Ensemble, … Tous les
                                    soutiens d’Emmanuel Macron, … </p>
                                <a style="    display: inline-block;
    color: #fff;
    font-weight: 600;
    border: 1px solid #fff;
    padding: 8px 25px;
    border-radius: 30px;" href="{{route('join-us')}}">Nous rejoindre</a>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-img" style="margin-top: 160px !important;">
                                <img src="{{asset('frontend/assets/img/banner/banner-main3.jpg')}}" style="max-width: 600px !important;" alt="Banner">
                              {{--  <div class="video-wrap">
                                    <button class="js-modal-btn" data-video-id="1wYLyzmUobQ">
                                        <i class="icofont-ui-play"></i>
                                    </button>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="benefit-area two pt-100 pb-70 wow fadeInUp" data-wow-duration="5s">
        <div class="container">
            <div class="row align-items-center">
                <div class="text-center">
                    <div class="section-title text-center">
                        <h2>Soutenez le parti</h2>
                        <p>Pour la communication, promouvoir la
                            Fédération 1 Million de Marcheurs, nous
                            avons besoin de votre don.</p>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-item">
                                <i class="flaticon-solidarity"></i>
                                <h3>
                                    <a href="{{route('join-us')}}">Adhérer</a>
                                </h3>
                                <p>Devenir 1 million d’adhérant
                                    Ça vous tente ? C’est Parti !</p>
                                <br>
                                <br>
                                <a class="feature-btn" href="{{route('join-us')}}">Nous rejoindre</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-item two">
                                <i class="flaticon-donation"></i>
                                <h3>
                                    <a href="{{route('donate')}}">Faire un don</a>
                                </h3>
                                <p>Pour la communication, promouvoir la
                                    Fédération 1 Million de Marcheurs, nous
                                    avons besoin de votre don.</p>
                                <a class="feature-btn" href="{{route('donate')}}">Faire un don</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="benefit-area two pt-50 pb-70 wow fadeInUp" id="about-us" data-wow-duration="5s">
        <div class="container">
                <div class="work-content">
                    <div class="section-title text-center">
                        <h2>Qui sommes-nous ?</h2>
                    </div>
                        <p style="text-align: justify;">La  Fédération  1  Million  de  Marcheurs  est  un  regroupement  de  plusieurs  personnes,  les
                            association,  les  collectives,  les  entreprises,… tous  soutenant  le progres, le  bien  vivre  ensemble
                            quelques  soit  nos  origines,  religion,….  </p>
                        <p>Notre Fédération est ouvert à toutes les idées, opinions et projets en phase avec les valeurs
                            rappelées ci-dessus, visant à améliorer le quotidien et l’avenir de nos concitoyens.</p>
                    </div>
                </div>
        </div>


    <div class="benefit-area two pt-50 pb-70 wow fadeInUp" data-wow-duration="5s">
        <div class="container">
            <div class="work-content">
                <div class="section-title text-center">
                    <h2>Pourquoi ?</h2>
                </div>
                <p style="text-align: justify;">La participation citoyenne aux décisions publiques est importante La Fédération 1
                    Million de Marcheurs souhaite pouvoir apporter une écoute attentive à tous et toutes.
                    Nous invitons toutes les associations, les groupes, les citoyens… à nous rejoindre.
                    Avec vous. La Fédération 1 Million de Marcheurs s’inscrit dans une démarche
                    constructive avec la majorité présidentielle</p>
            </div>
        </div>
    </div>
@endsection
