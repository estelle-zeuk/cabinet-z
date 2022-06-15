(function($){
    "use strict";

    $("#contactForm").validator().on("submit",function(event){
        let submit_button = $('.submit-button'),danger_block = $('.danger-block'),success_message = $('#success-message'),success_block = $('.success-block');
        submit_button.text('Traitement encours. Veuillez Patienter....');
        submit_button.attr('disabled',true);
        if(event.isDefaultPrevented()){
            formError();
            submitMSG(false,"Le formulaire n'a pas été correctement rempli!");
            submit_button.text('Envoyer');
            submit_button.attr('disabled',false);
        }else{

            $(this).submit();
        }
    });                                                                             

    function submitForm(form){
        let submit_button = $('.submit-button'),danger_block = $('.danger-block'),success_message = $('#success-message'),success_block = $('.success-block');
                submit_button.text('Traitement encours. Veuillez Patienter....');
                submit_button.attr('disabled',true);
                form.submit();
      /*   ajaxSubmitForm(form).then(response => {
                       if(response.success){
                          formSuccess();
                       }else{
                         formError();
                         submitMSG(false,text);
                       }
                      success_message.html(response.message);
                      danger_block.hide();
                      success_block.show();
                       submit_button.text('Rester informé(e)');
                       submit_button.attr('disabled',false);
          }).catch(error=>{
              danger_block.show();
              submit_button.text('Rester informé(e)');
              submit_button.attr('disabled',false);
          });*/
    }

        function formSuccess(){
        $("#contactForm")[0].reset();
        submitMSG(true,"Message Submitted!");
        }

        function formError(){
            $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
                $(this).removeClass();
            });
        }
        
        function submitMSG(valid,msg){
                if(valid){
                    let msgClasses="h4 tada animated text-success";
                }else{
                    let msgClasses="h4 text-danger";
                }
                $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
        }
}(jQuery));
