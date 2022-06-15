@extends('layouts.backend.admin')
@section('title', __('Company details'))
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 250px;
            height:200px;
        }

        .imagePreview {
            width: 100%;
            height: 300px;
            background-position: center center;
            background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .imgUp
        {
            margin-bottom:15px;
        }
        .del
        {
            position:absolute;
            top:0px;
            right:15px;
            width:30px;
            height:30px;
            text-align:center;
            line-height:30px;
            background-color: #f32828;
            cursor:pointer;
        }
        .imgAdd
        {
            width:30px;
            height:30px;
            border-radius:50%;
            background-color:#000000;
            color:#fff;
            box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
            text-align:center;
            line-height:30px;
            margin-top:0px;
            cursor:pointer;
            font-size:15px;
        }

        .imgAdd::before {
            display: block;
            content: '\002B';
        }
        .del::before {
            display: block;
            content: "X";
        }
        .inputCompany{
            font-size: 13px;
            color: #242424;
            border: solid 1px #e3e3e3;
            background: #f9f9f9;
            border-radius: 0;
        }
        .formh2{
            margin-left: -30px;
            margin-right: -30px;
            padding: 15px 30px 15px 30px;
            border-bottom: solid 1px #E2E2E2;
            margin-bottom: 10px;
            margin-top: 10px;
            font-weight: bold;
            text-transform: capitalize;
            text-transform: uppercase;
            font-size: 14px;
        }

        .input-label {
            padding: 5px 10px 5px 0;
            font-size: 14px;
            display: block;
            text-align: left;
            color: #414141;
        }
        div.tagsinput span.tag {
            background: #0766c6;
            border: 0;
            color: #fff;
            padding: 6px 14px;
            font-size: 0.8125rem;
            font-family: inherit;
            line-height: 1;
        }
        .label-info {
            background-color: #5bc0de;
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        tagsinput .tag {
            margin-right: 2px;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row profile-page">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-body">
                            <ul class="nav tab-switch" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="user-company-activity-tab" data-toggle="pill" href="#user-company-activity" role="tab" aria-controls="user-company-activity" aria-selected="false"><span class="icon-home"></span> {{__('labels.company-details')}}</a>
                                </li>
                            </ul>
                            <div class="col-md-12 container-fluid">
                                <div class="tab-content tab-body" id="profile-log-switch">
                                    <div class="tab-pane fade show active" id="user-company-activity" role="tabpanel" aria-labelledby="user-company-activity-tab">
                                        <div class="col-lg-12">
                                            <h4 class="card-title">{{__('labels.company-details')}}</h4>
                                            {!! Form::open(['route' => 'company.update', 'class' => 'form-control', 'id' => 'company-tap-form', 'method' => 'POST']) !!}
                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="service_name">{{__('labels.company-name')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="service_name" value="{{$company->service_name}}" {{--placeholder="{{__('labels.company-name')}}" --}}aria-label="{{__('labels.company-name')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.service-name-info')}}
                                                      </span>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="service_name">{{__('labels.address')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="address" value="{{$company->address}}" aria-label="{{__('labels.address')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.address-info')}}
                                                      </span>
                                                </div>
                                            </div>
                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="service_name">{{__('labels.primary-contact')}} <span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="phone" value="{{$company->phone}}" aria-label="{{__('labels.enter-primary-contact')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.primary-contact-info')}}
                                                      </span>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="service_name">{{__('labels.secondary-contact')}}</label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="phone2" value="{{$company->phone2}}" aria-label="{{__('labels.enter-secondary-contact')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.secondary-contact-info')}}
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="email">{{__('labels.email')}} <span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="email" class="form-control form-control-lg inputCompany" name="email" value="{{$company->email}}"  aria-label="{{__('labels.email')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.email-info')}}
                                                      </span>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="website">{{__('labels.youtube-video')}}</label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="website" value="{{$company->website}}"  aria-label="{{__('labels.website')}}">
                                                    <span class="explanation">
                                                            {{__('message.company-details.website-info')}}
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="registration_code">{{__('labels.registration-code')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="registration_code" value="{{$company->registration_code}}"  aria-label="{{__('labels.registration-code')}}">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="vat_registration">{{__('labels.vat-registration')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="vat_registration" value="{{$company->vat_registration}}"  aria-label="{{__('labels.vat-registration')}}">
                                                </div>
                                            </div>

                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="establishment-year">{{__('labels.establishment-year')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="text" class="form-control form-control-lg inputCompany" name="establishment_year" value="{{$company->establishment_year}}"  aria-label="{{__('labels.establishment-year')}}">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label for="hr_email">{{__('labels.hr-email')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <input type="email" class="form-control form-control-lg inputCompany" name="hr_email" value="{{$company->hr_email}}"  aria-label="{{__('labels.hr-email')}}">
                                                </div>
                                            </div>

                                            <h3 class="formh2">{{__('labels.about-company')}}</h3>
                                            <fieldset>
                                                @php $data = ['label_en'=>'Qui somme nous (En)','label_fr'=>'Qui somme nous (Fr)','description_en'=>$company->who_we_are_en,'description_fr'=>$company->who_we_are_fr,'fieldNameFr'=>'who_we_are_fr','fieldNameEn'=>'who_we_are_en']; @endphp
                                                @include('extension.description',$data)

                                                <div class="col-md-12" style="padding-top: 10px;">
                                                    <label for="mission" class="input-label">{{__('labels.our-mission')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <textarea style="height: 180px; margin: 0px; width: 100%;" type="text" class="form-control form-control-lg inputCompany" name="mission" value="{{$company->mission}}"  aria-label="{{__('labels.our-mission')}}">{{$company->mission}}</textarea>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px;">
                                                    <label for="vision" class="input-label">{{__('labels.our-vision')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <textarea style="height: 180px; margin: 0px; width: 100%;" type="text" class="form-control form-control-lg inputCompany" name="vision" value="{{$company->vision}}"  aria-label="{{__('labels.our-vision')}}">{{$company->vision}}</textarea>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px;">
                                                    <label for="value" class="input-label">{{__('labels.our-value')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                    <textarea style="height: 180px; margin: 0px; width: 100%;" type="text" class="form-control form-control-lg inputCompany" name="value" value="{{$company->value}}"  aria-label="{{__('labels.our-value')}}">{{$company->value}}</textarea>
                                                </div>
                                            </fieldset>

                                            <h3 class="formh2">{{__('labels.keywords')}}</h3>
                                            <div class="explanation" style="font-weight: bold;">{{__('message.company-details.keywords-info')}}</div>
                                            <div class="form-group col-md-6 col-sm-6">
                                                <label for="registration_code">{{__('labels.enter-keywords')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                                <input id="keywordsInput" style="height: 100px; margin: 0px; width: 100%;" name="keywords" class="form-control-lg" value="{{$company->keywords}}" data-role="tagsinput" type="text">
                                            </div>
                                            <input type="hidden" name="id" value="{{$company->id}}">
                                            <div class="col-md-4 col-sm-6 grid-margin stretch-card" style="display: none" id="loadingCompany">
                                                <div style="width: 100%; height: 50%">
                                                    <div class="dot-opacity-loader">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-success" style="display: none" id="successBlockCompany">
                                                <h3 style="text-align: center;"><strong>Success!</strong></h3>
                                                <p id="successMessageCompany"></p>
                                            </div>
                                            <div class="alert alert-error" style="display: none" id="errorBlockCompany">
                                                <h3 style="text-align: center;"><strong>Error!</strong></h3>
                                                <p id="errorMessageCompany"></p>
                                            </div>
                                            <div style="text-align: center">
                                                <button type="submit" id="companyButton" class="btn btn-info btn-fw"><i class="icon-notebook"></i>{{__('buttons.save-changes')}}</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Our approach</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <input type="hidden" id="add-photo" value="{{__('buttons.select-photo')}}">
    <input type="hidden" id="percentageComplete" value="{{ __('message.company-details.percentage-complete',['percent'=>50,'field'=>5]) }}">
    <input type="hidden" id="count" value="5">
    <input type="hidden" id="confirm-title" value="{{__('message.confirm.title')}}">
    <input type="hidden" id="confirm-message" value="{{__('message.confirm.message')}}">
@endsection
@section('js')
    <script src="{{asset('backend/js/owl-carousel.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    <script src="{{asset('backend/js/form-addons.js')}}"></script>
    <script src="{{asset('backend/js/x-editable.js')}}"></script>
    <script src="{{asset('backend/js/form-repeater.js')}}"></script>
    <script src="{{asset('backend/js/formpickers.js')}}"></script>

    <script>
        $(document).ready( function() {
            let option ={
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                timeOut: 10000
            };
            

            //logo changing letiables
            let processingLoader,errorMessageCompany,errorBlockCompany,loadingCompany,successBlockCompany,successMessageCompany,companyButton,saveButton,infoBlock,ajaxSpinner;

            saveButton = $('#save-logo');
            companyButton = $('#companyButton');
            infoBlock = $('#infoBlock');
            ajaxSpinner = $('#loading');
            loadingCompany = $('#loadingCompany');
            successMessageCompany = $('#successMessageCompany');
            successBlockCompany = $('#successBlockCompany');
            errorBlockCompany = $('#errorBlockCompany');
            errorMessageCompany = $('#errorMessageCompany');
            processingLoader = $('#processing');

            saveButton.attr("disabled", "disabled");
            ajaxSpinner.hide();
            infoBlock.show();


            function ajaxRequest(url) {
                processingLoader.show();
                $.ajax({
                    type:'GET',
                    data:{_token:$('#token').val()},
                    url:url,
                    success: function (data) {
                        processingLoader.hide();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }).then(function () {
                            location.reload();
                        })
                    },error:function (xhr) {
                        processingLoader.hide();
                        swal({
                            title: 'Error!',
                            text: xhr.responseJSON.message,
                            icon: 'error',
                            button: {
                                text: "Continue",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        }).then(function () {
                            location.reload();
                        })
                    }
                });
            }

            //Variables for home slider
            let homeSliderButton, homeImagesLoader, homeSuccessMessage, homeSuccessBlock, homeErrorBlock, homeErrorMessage;
            homeImagesLoader = $('#homeImagesLoader');
            homeSliderButton = $('#homeSliderButton');
            homeSuccessMessage = $('#homeSuccessMessage');
            homeSuccessBlock = $('#homeSuccessBlock');
            homeErrorBlock = $('#homeErrorBlock');
            homeErrorMessage = $('#homeErrorMessage');


            $(document).on('submit', 'form#home-sliders', function (event) {
                event.preventDefault();
                let form = $(this);
                let data = new FormData($(this)[0]);
                let url = form.attr("action");

                homeSliderButton.hide();
                homeImagesLoader.show();
                $.ajax({
                    type: form.attr('method'),
                    url: url,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        homeSliderButton.show();
                        homeImagesLoader.hide();
                        if(data.status){
                            homeSuccessMessage.html(data.message);
                            homeSuccessBlock.show();
                            homeErrorBlock.hide();
                        }else{
                            homeErrorMessage.html(data.message);
                            homeErrorBlock.show();
                            homeSuccessBlock.hide();
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("Error: " + errorThrown);
                    }
                });
                return false;
            });

            $(document).on('submit', 'form#company-tap-form', function (event) {
                event.preventDefault();
                let form = $(this),
                 data = new FormData($(this)[0]),
                 url = form.attr("action");

                     companyButton.hide();
                    loadingCompany.show();

                $.ajax({
                    type: form.attr('method'),
                    url: url,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                           companyButton.show();
                           loadingCompany.hide();
                           if(data.status === 'success'){
                               successMessageCompany.html(data.message);
                               successBlockCompany.show();
                               errorBlockCompany.hide();
                               if(data.count >= 0){
                                   toastr.info(data.configMessage, 'Info', option);
                               }
                           }else{
                               errorMessageCompany.html(data.message);
                               errorBlockCompany.show();
                               successBlockCompany.hide();

                           }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("Error: " + errorThrown);
                    }
                });
                return false;
            });

            $("#input-images").fileinput({
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ["jpg", "png", "gif"],
                showCaption: true,
                showRemove: false,
                showUpload: false
            });

            $("#slider-images").fileinput({
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ["jpg", "png", "gif"],
                showCaption: true,
                showRemove: false,
                showUpload: false
            });
        });
    </script>
@endsection
