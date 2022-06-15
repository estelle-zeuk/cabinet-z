@extends('layouts.backend.admin')

@section('title', __('labels.project.creation'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">Edition du publication</h4>
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
                        {!! Form::model($service, ['route' => ['service.update', $service->id],  'id'=>'claForm', 'files'=>true, 'method' => 'PUT', 'class' => 'forms-sample']) !!}
                            <h3 class="formh2">1. Informations générales</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('Titre (En)')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="title_en" type="text" value="{{$service->title_en}}" required>
                                </div>
                                <div class="form-group col-md-6" id="title-fr" style="display: block">
                                    <label for="title">{{__('Titre (Fr)')}}</label>
                                    <input class="form-control" name="title_fr" type="text" value="{{$service->title_fr}}"  required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="summary_en">{{__('Brève description(En)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_en" class="form-control" name="summary_en" data-value="{{$service->summary_en}}"  required>{{$service->summary_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="summary_fr">{{__('Brève description (Fr)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_fr" class="form-control" name="summary_fr"  data-value="{{$service->summary_fr}}"   required>{{$service->summary_fr}}</textarea>
                                </div>
                            </div>
                        <h3 class="formh2">2. Description détaillée</h3>
                        @include('extension.description',$data)
                            <h3 class="formh2">3. Image (Aperçu) <span class="explanation">Image will automatically be redimensioned to 371w x 255h</span></h3>
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
                                <img src="{{asset('frontend/images/services/'.$service->image)}}" style="width: 371px;height:255px;" id='img-upload'/>
                            </div>
                            <h3 class="formh2">4. {{__('labels.images')}}</h3>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="col-form-label">{{__('Selectionnez le fichier')}} (<span style="font-weight: bold;" class="explanation">{{__('Use to attach to publications')}}</span>)</label>
                                <div class="file-loading">
                                    <input id="input-documents" name="document" type="file" accept="application/pdf,application/vnd.ms-excel">
                                </div>
                            </div>
                          @if($service->document)
                            <div class="form-group col-md-6">
                                <iframe src ="{{asset('documents/'.$service->document)}}" style="width:100%; height:400px;"></iframe>
                            </div>
                          @endif
                        </div>
                            <div style="text-align: center">
                                <button id="submit-button" type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('service.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="confirm-title" value="{{__('message.confirm.title')}}">
        <input type="hidden" id="confirm-message" value="{{__('message.confirm.message')}}">
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/js/editorDemo.js')}}"></script>
@endsection

