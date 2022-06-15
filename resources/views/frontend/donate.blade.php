@extends('layouts.frontend.app')
@section('title','Donner')

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
            border-radius: 25px;
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
            border-radius: 25px;
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
                    <h2 id="heading">Donner</h2>
                    <form id="msform">
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Identification</strong></li>
                            <li id="personal"><strong>Adhésion</strong></li>
                            <li id="payment"><strong>Coordonnées</strong></li>
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
                                <input type="text" required/>
                                <label class="fieldlabels">Email: *</label>
                                <input type="email" name="email" required/>
                                <label class="fieldlabels">Confirmer Email: *</label>
                                <input type="email" name="c_email" required />

                                <label for="news" style="display: inline-flex;">
                                    <input type="checkbox" id="news" style="position: relative; top: 40px;">
                                    <p>J’accepte de recevoir les communications à caractère politique du parti Un million de marcheurs
                                        (consultations thématiques, débats, réunions publiques, animations locales, élections internes, newsletter)</p>
                                </label>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Poursuivre" />
                        </fieldset>
                        <fieldset id="adhesion">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Contribuez au lancement du parti</h2>
                                        <small style="position: relative; top: -15px;">Voulez-vous faire un don en plus de votre adhésion</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="30e">30€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="60e">60€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="120e">120€</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-info" id="200e">200€</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-6">
                                    <input type="number" value="" id="don" min="0" oninput="validity.valid||(value='');"
                                           placeholder="Saisir votre montant" style="border-radius: 25px;">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Total: <span id="montant_total_ht" class="pull-right"></span>€</h2>
                                    </div>
                                </div>

                            </div>
                            <input type="button" name="next" class="next action-button" value="Poursuivre" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                        </fieldset>
                        <fieldset id="coordonnees">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">3/Coordonnées:</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Civilité: *</label><br>
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
                                <input type="text" required/>
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
                                <label class="fieldlabels">Civilité: *</label><br>
                                <select name="" id="" class="fieldlabels" required>
                                    <option value="">Choisir un pays</option>
                                    <option value="">France</option>
                                    <option value="">Cameroun</option>
                                </select><br><br><br>
                                <label class="fieldlabels">Email: *</label>
                                <input type="email" name="email" required/>
                                <label class="fieldlabels">Téléphone: *</label>
                                <input type="tel" required />

                                <label for="news" style="display: inline-flex;">
                                    <input type="checkbox" id="news" style="position: relative; top: 40px;">
                                    <p>Je certifie sur l’honneur que je suis une personne physique. Mon règlement ne provient
                                        pas du compte d’une personne morale mais de mon compte bancaire personnel ou de celui
                                        de mon conjoint, concubin, ascendant ou descendant. Je suis de nationalité française ou
                                        résident en France, conformément à l’article 11-4 de la loi n°88-227 du 11 mars 1988. *</p>
                                </label>
                                <label for="news" style="display: inline-flex;">
                                    <input type="checkbox" id="news" style="position: relative; top: 40px;">
                                    <p>
                                        J’acceptJ'ai lu et j'accepte la <a href="">politique de confidentialité</a> relative
                                        au recueil de mes données personnelles et je reconnais adhérer aux <a
                                                href="">statuts</a> et aux règles de fonctionnement du parti.
                                    </p>
                                </label>
                            </div>
                            <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            <input type="button" name="next" class="next action-button" value="Chèque" />&nbsp;&nbsp;
                            <input type="button" name="next" class="next action-button" value="Carte" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-3" style="margin-top: 360px">
                <div class="benefit-item" id="apayer" style="display: none;">
                    <i class="flaticon-donation"></i>
                    <h3>Récapitulatif paiement</h3>
                    <h6 class="fs-title" style="text-align: center">Adhésion -26ans: <span id="montant_total_ht" class="pull-right">15</span>€</h6>
                    <h6 class="fs-title" style="text-align: center">Total: <span id="montant_total_ht" class="pull-right">15</span>€</h6>
                    <hr>
                    <small style="position: relative; top: -15px;">Soit après réduction d'impôt: <span id="montant_total">5,1</span>€</small>
                </div>
                <div class="benefit-item">
                    <i class="flaticon-solidarity"></i>
                    <h3>Adhérer en toute confiance</h3>
                    <p>Vous êtes sur une plateforme sécurisée par un certificat SSL qui permet un chiffrement de vos données bancaires.</p>
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
            var steps = $("fieldset").length;

            //setProgressBar(current);

            $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

//Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
                next_fs.show();
                console.log(next_fs.attr('id'));
                if (next_fs.attr('id') == 'coordonnees'){
                    $('#apayer').show();
                }else{
                    $('#apayer').hide();
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

            $('#30e').click(function () {
                $('#don').val('30');
                console.log($('#don').val());
                let calcul = $('#don').val();
                $('#montant_total_ht').html(calcul);

            });
            $('#60e').click(function () {
                $('#don').val('60');
                console.log($('#don').val());
                let calcul = $('#don').val();
                $('#montant_total_ht').html(calcul);

            });
            $('#120e').click(function () {
                $('#don').val('120');
                console.log($('#don').val());
                let calcul = ($('#don').val()).toFixed(2);
                $('#montant_total_ht').html(calcul);

            });
            $('#200e').click(function () {
                $('#don').val('200');
                console.log($('#don').val());
                $('#montant_don').html((($('#don').val())*0.34).toFixed(2));
                let calcul = +$('#don').val();
                $('#montant_total_ht').html(calcul);

            });

            $('#don').keyup(function () {
                $('#montant_total_ht').html((+$(this).val()).toFixed(2));
            });

        });
    </script>
@endsection
