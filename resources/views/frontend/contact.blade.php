@extends('layouts.frontend.app')
@section('title','Contactez-nous')

@section('content')
    <div class="contact-info-area pt-100 pb-70">
        <div class="container" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-location-pin"></i>
                        <span>Localisation:</span>
                        <a href="">322 rue du Boulidou 34980 Saint Clément de Rivière</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-call"></i>
                        <span>Téléphone:</span>
                        <a href="tel:+33 0753928571">+33 075-392-85-71</a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-email"></i>
                        <span>Email:</span>
                        <a href="mailto:contact@lf1mdem.com">contact@lf1mdem.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area pb-70">
        <div class="container">
            <x-alert/>
            <form id="contactForm" action="{{route('enquiry')}}" method="post">
                @csrf
                <h2>Contactez-nous...!</h2>
                <p>Pour plus d’informations, questions ou recommandations, vous pouvez nous appeler.</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom et prénom" required data-error="Entrer votre nom et prénom">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Entrer votre adresse email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="phone_number">
                                <i class="icofont-ui-call"></i>
                            </label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Téléphone" required data-error="Entrer votre numéro de téléphone" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="msg_subject">
                                <i class="icofont-notepad"></i>
                            </label>
                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" placeholder="Sujet" required data-error="Entrer un sujet">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="message">
                                <i class="icofont-comment"></i>
                            </label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Votre message" required data-error="Saisir votre message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    {{--<div class="col-lg-6">
                        <div class="form-group">
                            <input type="checkbox" name="pdc" value="pdc" id="pdc" class="" required data-error="Accepter les conditions">
                            <label for="pdc"></label>J'accepte la <a href="#">politique de confidentialité</a>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>--}}
                    <div class="col-lg-12">
                        <button type="submit" class="btn common-btn submit-button">
                            Envoyer
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
