@extends('layouts.frontend.app')
@section('title','Adhérer')

@section('css')
    <style>
        .btn-outline-info:hover {
            color: white;
            background-color: #0c3a76;
            border-color: #0c3a76;}

        .btn-outline-info {
            color: #0c3a76;
            border-color: #0c3a76;
        }
        #heading {
            text-transform: uppercase;
            color: #0c3a76;
            font-weight: normal;
            margin-top: 100px;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .nice-select{
            width: 100%;
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #0c3a76;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #0c3a76;
            outline-width: 0
        }

        #msform .action-button {
            width: 110px;
            background: #0c3a76;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px;
            margin: 10px 5px 10px 5px;
            float: right;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #0c3a76
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #0c3a76;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #0c3a76;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #0c3a76
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "1"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "2"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "3"
        }

        #progressbar #confirm:before {
            font-family: Arial, Helvetica, sans-serif;
            content: "4"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #0c3a76
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #0c3a76
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-9 col-md-9 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <h2 id="heading">Adhérer</h2>
                        <p>
                            Vous êtes une Association, un groupe, un collectif, … Vous soutenez ou vous pensez soutenir notre Président ?
                            Rejoignez-nous, Nous nous groupons au sein de la Fédération 1 Million de Marcheurs.
                        </p>
                        <x-alert/>
                        <div style="color:red; display: none" id="error-block">
                            <h6>Vous ne pouvez pas soumettre votre adhésion sans avoir rempli les champs obligatoires marqués d'un astérisque (*)</h6>
                            <ul id="show-error" style="color:red; text-align: left;">
                            </ul>
                        </div>
                    </div>
                    <form id="msform" action="{{route('submit.membership')}}" method="post">
                        @csrf
                        <div class="form-card">
                            <label for="civility" class="fieldlabels">Civilité: *</label><br>
                                <select name="civility" data-message="Civilité est requis" class="required-step1"  id="civility" required>
                                <option value="">Choisir une civilité</option>
                                <option value="Mme">Madame</option>
                                <option value="M">Monsieur</option>
                            </select>
                            <label for="name" class="fieldlabels">Nom: *</label>
                            <input class="required-step1" name="name" data-message="Le nom est requis" type="text" id="name"  required />
                            <label for="surname"  class="fieldlabels">Prénom: *</label>
                            <input class="required-step1"  data-message="Le prénom est requis" name="surname" type="text" id="surname" required/>
                            <label for="email" class="fieldlabels">Email: *</label>
                            <input  class="required-step1" data-message="L'email est requis" type="email" name="email" id="email" required/>
                            <label for="phone" class="fieldlabels">Phone: *</label>
                            <input  class="required-step1   " data-message="Le numéro de téléphone est requis" type="number" name="phone" id="phone" required/>
                            <label for="address" class="fieldlabels">Adresse: *</label>
                            <input class="required-step1" data-message="L'ddresse est requise" type="text" name="address"  id="address"  required/>
                            <label for="city" class="fieldlabels">Ville: *</label>
                            <input  class="required-step1" data-message="La ville est requise" type="text" name="city" id="city"  required/>
                            <label for="postal_code" class="fieldlabels">Code postal: *</label>
                            <input  class="required-step1" data-message="Le code postal est requis" type="number" name="postal_code" id="postal_code"  required/>
                            {{--<label for="news" style="display: inline-flex;">
                                <input class="required-step1" data-message="Acceptez les conditions générales" type="checkbox" id="news" value="" style="position: relative; top: 15px; width: 55px; height: 30px; margin-right: 7px;" required>
                                <p style="font-size: 13px !important;">Oui, j'adhère à la <a href="">charte des valeurs, aux statuts et aux règles de fonctionnement</a>  de La République En Marche, ainsi qu'aux
                                    <a href="">conditions générales d'utilisation</a>  du site et à la <a href="">politique de protection des données à caractère personnel</a>  du site</label>--}}
                        </div>
                        <div class="text-center">
                            <button type="submit" data-step="1" name="next" class="next action-button">J'adhere</button>
                        </div>
                    </form>
                  {{--  <form id="msform">
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Identification</strong></li>
                            <li id="personal"><strong>Adhésion</strong></li>
                            <li id="confirm"><strong>Paiement</strong></li>
                        </ul>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">1/ Identification:</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Civilité: *</label><br>
                                <select name="" id="civilite" class="fieldlabels" required>
                                    <option value="">Choisir une civilité</option>
                                    <option value="Mme">Madame</option>
                                    <option value="M">Monsieur</option>
                                </select>
                                <label class="fieldlabels">Nom: *</label>
                                <input class="required-step1" data-message="Le nom est requis" type="text" id="prenom" required />
                                <label   class="fieldlabels">Prénom: *</label>
                                <input data-message="Le prénom est requis" type="text" id="nom" />
                                <label class="fieldlabels">Adresse: *</label>
                                <input  data-message="L'adresse est requise" type="text" id=""  />
                                <label class="fieldlabels">Adresse 2:</label>
                                <input type="text" id=""  />
                                <label class="fieldlabels">Ville: *</label>
                                <input  class="required-step1" data-message="La ville est requise" type="text" id=""  />
                                <label class="fieldlabels">Code postal: *</label>
                                <input  class="required-step1" data-message="Le code postal est requis" type="number" id=""  />
                                <label class="fieldlabels">Numéro de téléphone: *</label>
                                <input  class="required-step1" data-message="Le numéro de téléphone est requis" type="tel" id=""  />
                                <label class="fieldlabels">Date de naissance: *</label>
                                <input type="date" class="required-step1" data-message="La date de naissance est requise" id="" name=""  required/>
                                <label class="fieldlabels">Email: *</label>
                                <input  class="required-step1" data-message="L'email est requis" type="email" name="email" id="email" required/>
                                <label class="fieldlabels">Confirmer Email: *</label>
                                <input  class="required-step1" data-message="La confirmation de l'email est requise" type="email" id="c_email" name="c_email" required />
                                <small id="c_email_error"></small>
                                <label for="news" style="display: inline-flex;">
                                    <input type="checkbox" id="news" style="position: relative; top: 15px; width: 55px; height: 30px; margin-right: 7px;">
                                    <p style="font-size: 13px !important;">Je certifie sur l'honneur être une personne physique résidant en France et,
                                        conformément à la loi n°95-65 du 19 janvier 1995 relative au financement de la vie
                                        associative, que le règlement de mon adhésion et/ou de mon don ne provient pas d'une personne morale.  </p>
                                </label>
                            </div>
                            <div style="color:red; display: none" id="error-block">
                                <h6>Vous ne pouvez pas passer cette étape sans avoir rempli les champs obligatoires marqués d'un astérisque (*)</h6>
                                <ul id="show-error" style="color:red; text-align: left;">
                                </ul>
                            </div>
                            <button type="button" name="next" data-step="1" class="next action-button" id="validate_coordonnees">Poursuivre</button>
--}}{{--
                            <input type="button" name="next" data-step="1" class="next action-button" id="validate_coordonnees" value=" Poursuivre " />
--}}{{--
                        </fieldset>
                        <fieldset id="adhesion">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-9">
                                        <h2 class="fs-title">Soutenez la fédération 1 Millions de marcheurs</h2>
                                        <small style="position: relative; top: -15px;">En adhérant ou en faisant un don</small>
                                    </div>
                                </div>
                                <br>
                                --}}{{--<button type="button" class="btn btn-outline-info col-md-4" style="border-radius: 30px;">15€</button>
                                <small>Soit après réduction d'impôt: 5,10€</small>
                                <br><br>
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Contribuez au lancement du parti</h2>
                                        <small style="position: relative; top: -15px;">Voulez-vous faire un don en plus de votre adhésion</small>
                                    </div>
                                </div>--}}{{--
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="20e">20€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="50e">50€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="120e">120€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="200e">200€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="500e">500€</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-6">
                                    <input type="number" value="" id="don" min="0" oninput="validity.valid||(value='');"
                                           class="required-step2" data-message="Un montant d'adhésion est requis"
                                           placeholder="Saisir votre montant" style="border-radius: 25px;">
                                    <div class="row">
                                    <small style="position: relative; top: -15px;">Soit après réduction d'impôt: <span id="montant_don"></span>€</small>
                                </div>
                                    <div class="col-7">
                                        <h2 class="fs-title">Total: <span id="montant_total_ht" class="pull-right"></span>€</h2>
                                        <hr>
                                        <small style="position: relative; top: -15px;">Soit après réduction d'impôt: <span id="montant_total"></span>€</small>
                                    </div>
                                </div>

                            </div>
                            <input type="button" name="next" data-step="2" class="next action-button" value="Poursuivre" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            <div id="error-step2" style="color: red; text-align: left;">
                            </div>
                        </fieldset>
                        --}}{{--<fieldset id="coordonnees">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">3/Coordonnées:</h2>
                                    </div>
                                </div>
                                --}}{{----}}{{--<label class="fieldlabels">Civilité: *</label><br>
                                <select name="" id="" class="fieldlabels" required>
                                    <option value="">Choisir une civilité</option>
                                    <option value="Mme">Madame</option>
                                    <option value="M">Monsieur</option>
                                </select><br><br>
                                <label class="fieldlabels">Date de naissance: *</label>
                                <input type="date"  required/>
                                <label class="fieldlabels">Prénom: *</label>
                                <input type="text" required />
                                <label class="fieldlabels">Nom: *</label>
                                <input type="text" required/>--}}{{----}}{{--
                                <label class="fieldlabels">Profession: *</label><br>
                                <select name="" id="" class="fieldlabels" required>
                                    <option value="">Choisir une profession</option>
                                    <option value="1">Agriculteur</option>
                                    <option value="2">Artisan</option>
                                    <option value="3">Commerçant</option>
                                    <option value="4">Chef d'entreprise</option>
                                    <option value="5">Cadre ou profession intellectuelle supérieure</option>
                                    <option value="6">Profession intermédiaire</option>
                                    <option value="7">Employé</option>
                                    <option value="8">Ouvrier</option>
                                    <option value="9">Retraité</option>
                                    <option value="10">Sans activité professionnelle</option>
                                    <option value="11">Etudiant</option>
                                </select><br><br>
                                <label class="fieldlabels">Adresse: *</label>
                                <input type="text" required />
                                <label class="fieldlabels">Code postal: *</label>
                                <input type="text" required />
                                <label class="fieldlabels">Ville: *</label>
                                <input type="text" required />
                                <label class="fieldlabels">Pays: *</label><br>
                                <select name="" id="" class="fieldlabels" required>
                                    <option value="">Choisir un pays</option>
                                    <option value="">France</option>
                                    <option value="">Cameroun</option>
                                </select><br><br><br>
                                --}}{{----}}{{--<label class="fieldlabels">Email: *</label>
                                <input type="email" name="email" required/>--}}{{----}}{{--
                                <label class="fieldlabels">Téléphone: *</label>
                                <input type="tel" required />
                                <div class="row">
                                    <label for="news" style="display: inline-flex;">
                                        <input type="checkbox" id="news" style="position: relative; top: 40px;">
                                        <p>Je certifie sur l’honneur que je suis une personne physique. Mon règlement ne provient
                                            pas du compte d’une personne morale mais de mon compte bancaire personnel ou de celui
                                            de mon conjoint, concubin, ascendant ou descendant. Je suis de nationalité française ou
                                            résident en France, conformément à l’article 11-4 de la loi n°88-227 du 11 mars 1988. *</p>
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="news" style="display: inline-flex;">
                                        <input type="checkbox" id="news" style="position: relative; top: 40px;">
                                        <p>
                                            J'ai lu et j'accepte la <a href="#">politique de confidentialité</a> relative
                                            au recueil de mes données personnelles et je reconnais adhérer aux <a
                                                    href="#">statuts</a> et aux règles de fonctionnement du parti.
                                        </p>
                                    </label>
                                </div>

                            </div>
                            <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            <input type="button" name="next" class="next action-button" value="Chèque" />&nbsp;&nbsp;
                            <input type="button" name="next" class="next action-button" value="Carte" />
                        </fieldset>--}}{{--
                        <fieldset id="paiement">
                            <div class="benefit-item" id="">
                                <i class="flaticon-donation"></i>
                                <h3>Récapitulatif paiement</h3>
                                <h6 class="fs-title" style="text-align: center">Total: <span id="a_payer_ht" class="pull-right"></span>€</h6>
                                <hr>
                                <small style="position: relative; top: -15px;">Soit après réduction d'impôt: <span id="a_payer_ttc"></span>€</small>
                            </div>
                            <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            <input type="button" name="next" class="next action-button" value="Chèque" />&nbsp;&nbsp;
                            <input type="button" name="next" class="next action-button" value="Carte" />
                        </fieldset>
                    </form>--}}
                </div>
            </div>
            <div class="col-md-3 col-sm-3" style="margin-top: 360px">
                <div class="benefit-item" id="apayer" style="display: none;">
                    <i class="flaticon-donation"></i>
                    <h3>Récapitulatif paiement</h3>
                    <h6 class="fs-title" style="text-align: center">Total: <span id="a_payer_ht" class="pull-right"></span>€</h6>
                    <hr>
                    <small style="position: relative; top: -15px;">Soit après réduction d'impôt: <span id="a_payer_ttc"></span>€</small>
                </div>
                <div class="benefit-item">
                    <i class="flaticon-solidarity"></i>
                    <h3>Adhérer </h3>
                    <p> Pour les actions ensemble, la représentation, reconstruction et de libre expression des adhérents.
                        Nous avançons ensemble. 1 Million d’adhérents. Soyez fier d’être comptabilisé dans 1 Millions de Marcheurs</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            let general_condition = $('#news');
            var steps = $("fieldset").length;

            //setProgressBar(current);
            general_condition.click(function () {
                if($(this).is(':checked')){
                    $(this).val('1');
                }else{
                    $(this).val('');
                }
            });

            $(".next").click(function(){
                let step = $(this).data('step'),
                errorDisplay =  $('#show-error');
                console.log(step);
                if(parseInt(step) === 1){
                    console.log('in step one');
                    let inputErrors = [];
                    $(".required-step1").each(function() {
                        console.log($(this).hasClass('nice-select'),$(this));
                        if($(this).val() ==='' && !$(this).hasClass('nice-select')){
                            inputErrors.push($(this).data('message'));
                        }
                    });
                    /*if ($('#email').val() != $('#c_email').val()){
                        $('#c_email_error').html('Les deux adresses ne correspondent pas');
                    }*/

                   if(inputErrors.length >0){
                       console.log('in if clause');
                       let message = '';
                       inputErrors.forEach(value=>{
                           message += '<li>'+value+'</li>';
                       });
                       errorDisplay.html(message);
                       errorDisplay.show();
                       $('#error-block').show();

                   }else{
                       errorDisplay.hide();
                       $('#error-block').hide();
                       current_fs = $(this).parent();
                       next_fs = $(this).parent().next();

                       //Add Class Active
                       $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                       //show the next fieldset
                       next_fs.show();
                       console.log(next_fs.attr('id'));
                       if (next_fs.attr('id') == 'paiement'){
                           $('#a_payer_ht').val(+$('#don').val());
                           //alert($('#a_payer_ht').val());
                           $('#a_payer_ttc').val((+($('#don').val())*0.34).toFixed(2));
                       }
                       //hide the current fieldset with style
                       current_fs.animate({opacity: 0}, {
                           step: function(now) {
                               // for making fielset appear animation
                               opacity = 1 - now;

                               current_fs.css({
                                   'display': 'none',
                                   'position': 'relative'
                               });
                               next_fs.css({'opacity': opacity});
                           },
                           duration: 500
                       });
                       //setProgressBar(++current);
                   }
                   console.log($('#news').val());
                    $('html, body').animate({
                        scrollTop: $("#tcApp").offset().top
                    }, 500);
                    console.log(inputErrors);
                }else if(parseInt(step) === 2){
                    let message = $('#don').data('message');
                    console.log(message);
                    console.log('step 2');
                    if ($('#don').val() == ''){
                        $('#error-step2').html(message);
                    } else {
                        $('#error-step2').css('display', 'none');
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();
                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        //show the next fieldset
                        next_fs.show();
                        console.log(next_fs.attr('id'));
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                            step: function(now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({'opacity': opacity});
                            },
                            duration: 500
                        });

                    }
                }
            });

            $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                //setProgressBar(--current);
            });

            /*function setProgressBar(curStep){
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width",percent+"%")
            }*/

            $(".submit").click(function(){
                return false;
            });

            $('#20e').click(function () {
                $('#don').val('20');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = +$('#don').val();
                $('#montant_total_ht').html(calcul);
                $('#montant_total').html((+($('#don').val())*0.34).toFixed(2));
                console.log($('#montant_don').val());
            });
            $('#50e').click(function () {
                $('#don').val('50');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = +$('#don').val() ;
                $('#montant_total_ht').html(calcul);
                $('#montant_total').html((+($('#don').val())*0.34).toFixed(2));
                console.log($('#montant_don').val());
            });
            $('#120e').click(function () {
                $('#don').val('120');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = (+$('#don').val()).toFixed(2);
                $('#montant_total_ht').html(calcul);
                $('#montant_total').html((+($('#don').val())*0.34).toFixed(2));
                console.log($('#montant_don').val());
            });
            $('#200e').click(function () {
                $('#don').val('200');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = +$('#don').val();
                $('#montant_total_ht').html(calcul);
                $('#montant_total').html((+($('#don').val())*0.34).toFixed(2));
                console.log($('#montant_don').val());
            });
            $('#500e').click(function () {
                $('#don').val('500');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = +$('#don').val();
                $('#montant_total_ht').html(calcul);
                $('#montant_total').html((+($('#don').val())*0.34).toFixed(2));
                console.log($('#montant_don').val());
            });

            $('#don').keyup(function () {
                $('#montant_don').html(($(this).val()*0.34).toFixed(2));
                $('#montant_total_ht').html((+$(this).val()).toFixed(2));
                $('#montant_total').html((+($(this).val())*0.34).toFixed(2));
            });



        });
    </script>
    @endsection
