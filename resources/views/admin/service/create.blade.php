@extends('layouts.backend.admin')

@section('title', __('Actualité / Evénément'))
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('Création de Services/Experience')}}</h4>
                        @if (Session::get('status') == 'success')
                            <div class="alert alert-success alert-block" style="text-align: center;">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>
                        @endif
                        @if (Session::get('status') == 'danger')
                            <div class="alert alert-danger alert-block" style="/*padding-top: 50px; */text-align: center;">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>
                        @endif
                        {!! Form::open(['route' => 'service.store', 'files'=>true, 'id'=>'claForm', 'class' => 'forms-sample']) !!}
                            <h3 class="formh2">1. Informations générales</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('Titre (En)')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="title_en" type="text"  required>
                                </div>
                                <div class="form-group col-md-6" id="title-fr" style="display: block">
                                    <label for="title">{{__('Titre (Fr)')}}</label>
                                    <input class="form-control" name="title_fr" type="text"  required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="type">{{__('Type')}}</label>
                                    <select  class="form-control" name="type" id="type_id">
                                        <option value="0">Service</option>
                                        <option value="1">Expérience</option>
                                        <option value="2">Actualités</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="summary_en">{{__('Brève description(En)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_en" class="form-control" name="summary_en"  required> </textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="summary_fr">{{__('Brève description (Fr)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_fr" class="form-control" name="summary_fr"  required> </textarea>
                                </div>
                            </div>
                            <h3 class="formh2">2. Description détaillée</h3>
                            @include('extension.description',$data)
                            <h3 class="formh2">3. Image (Aperçu) <span class="explanation">Image will automatically be redimensioned to 720w x 965h</span></h3>
                            <div class="form-group">
                                <div class="input-group">
                                 <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      <button class="btn btn-primary btn-sm" id="browseButton">{{__('Sélectionnez l\'aperçu')}}…</button>
                                      <input name="image" type="file" id="imgInp">
                                       </span>
                                  </span>
                                    <input type="hidden" id="logo-input" class="form-control col-md-12" readonly>
                                </div>
                                <img style="width: 250px;height:200px;" id='img-upload'/>
                            </div>
                            <h3 class="formh2">4. {{__('labels.images')}}</h3>
                            @include('extension.document')
                            <div style="text-align: center">
                                <button id="submit-button" type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('news.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('backend/js/editorDemo.js')}}"></script>
    <script>
        $(function () {
            $(document).on('change', '.btn-file :file', function(e) {
                e.preventDefault();
                let input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                event.preventDefault();
                let input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log )
                        console.log(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#imgInp').change(function(){
                readURL(this);
            });
        });
    </script>
@endsection

