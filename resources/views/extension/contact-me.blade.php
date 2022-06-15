<div class="col-lg-6 custom-sm-margin-top">
    <h2 class="font-weight-bold">- Ecrivez moi</h2>
    <div class="alert alert-success d-none mt-4" id="contactSuccess">
        <strong>Succès!</strong> Votre message a été envoyé avec succès.
    </div>

    <div class="alert alert-danger d-none mt-4" id="contactError">
        <strong>Erreur!</strong> Une erreur est survenue lors de l'envoi de votre message. Veuillez reessayer ou appelez moi en direct sur téléphone!
        <span class="text-1 mt-2 d-block" id="mailErrorMessage"></span>
    </div>
    <form id="contactForm" class="custom-contact-form-style-1" action="{{mob_route('enquiry')}}" method="POST">
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div class="form-row">
            <div class="form-group col">
                <div class="custom-input-box">
                    <i class="icon-user icons text-color-primary"></i>
                    <input type="text" value="" data-msg-required="Entrez votre nom" maxlength="100" class="form-control" name="name" id="name" placeholder="Nom*" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <div class="custom-input-box">
                    <i class="icon-envelope icons text-color-primary"></i>
                    <input type="email" value="" data-msg-required="Entrez votre email." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="Email*" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <div class="custom-input-box">
                    <i class="icon-bubble icons text-color-primary"></i>
                    <textarea maxlength="5000" data-msg-required="Entrez votre message." rows="10" class="form-control" name="message" id="message" placeholder="Message*" required></textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <input type="submit" value="Envoyez le message" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase" data-loading-text="Traitément encours...">
            </div>
        </div>
    </form>
</div>
