(function($) {
  'use strict';
  /*Summernote editor for department description document*/
   let document_description = $("#summernoteDepartment"),
       description_en = $("#description-en"),
       description_fr = $("#description-fr"),
       description_convert_en = $("#description_en"),
       description_convert_fr = $("#description_fr"),
       submit_button = $("#submit-button"),
       claForm = $("#claForm"),
       upload_URL = $('#image-upload-url').val(),
       token = $('#token').val(),
       delete_URL = $('#delete-file-url').val(),
       option ={
        "positionClass": "toast-bottom-center",
        "iconClass": 'toast-info',
        timeOut: 10000
    };

  if (document_description.length) {
      document_description.summernote({
        callbacks: {
            onImageUpload: function(files) {
                for(var i=0; i < files.length; i++) {
                    $.upload(files[i],document_description);
                }
            },
            onMediaDelete : function(target) {
                for(var i=0; i < target.length; i++) {
                    $.deleteFile(target[i].src);
                    console.log(target[i].src);
                }

            }
        },
      height: 300,
      tabsize: 2
    });
  }


    if (description_en.length) {
        description_en.summernote({
            callbacks: {
                 onBlur: function() {
                    description_convert_en.val(description_en.summernote('code'));
                },
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i],description_en);
                    }
                },
                onMediaDelete : function(target) {
                    for(let i=0; i < target.length; i++) {
                        $.deleteFile(target[i].src);
                        console.log(target[i].src);
                    }

                }
            },
            height: 300,
            tabsize: 2
        });
    }

    if (description_fr.length) {
        description_fr.summernote({
            callbacks: {
                onBlur: function() {
                    description_convert_fr.val( description_fr.summernote('code'));
                },
                onImageUpload: function(files) {
                    for(var i=0; i < files.length; i++) {
                        $.upload(files[i],description_fr);
                    }
                },
                onMediaDelete : function(target) {
                    for(var i=0; i < target.length; i++) {
                        $.deleteFile(target[i].src);
                        console.log(target[i].src);
                    }

                }
            },
            height: 300,
            tabsize: 2
        });
    }

     /********************************************************
     * generalForm
     * @param file
     * @param target
     *******************************************************/
        submit_button.click(function (e) {
                e.preventDefault();
                let englishValue = description_en.summernote('code'), frenchValue = description_fr.summernote('code');
                    description_convert_en.val(englishValue);
                    description_convert_fr.val(frenchValue);
                claForm.submit();
        });

     /********************************************************
     *   Search ajax
     * @param url
     * @param data
     * @param method
     * @param loading
     * @param target
     *******************************************************/
    function ajaxSearch(url,data,method,loading,target) {

     }

    /*************************************************************
     *
     * @param file
     * @param target
     */

    $.upload = function (file,target) {
        var out = new FormData();
        out.append('images', file, file.name);
        out.append('_token', token);
        $.ajax({
            method: 'POST',
            url: upload_URL,
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function (img) {
              if(img.success){
                  target.summernote('insertImage', img.url);
              }else{
                  swal({
                      title: 'Error!',
                      text: img.message,
                      icon: 'error',
                      button: {
                          text: "OK",
                          value: true,
                          visible: true,
                          className: "btn btn-primary"
                      }
                  })
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
                alert(textStatus + " " + errorThrown);
            }
        });
    };

    $.deleteFile = function (url) {

        var form = new FormData();
        form.append('_token', token);
        form.append('url', url);

        $.ajax({
            method: 'POST',
            url: delete_URL,
            contentType: false,
            cache: false,
            processData: false,
            data: form,
            success: function (response) {
              if(response.success){
                  $.toast(response.message, option);
              }else{
                  alert(response.message);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
                alert(textStatus + " " + errorThrown);
            }
        });
    };
})(jQuery);
