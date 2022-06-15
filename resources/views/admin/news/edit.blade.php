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
                        {!! Form::model($news, ['route' => ['news.update', $news->id],  'id'=>'claForm', 'files'=>true, 'method' => 'PUT', 'class' => 'forms-sample']) !!}
                            <h3 class="formh2">1. Information Generale</h3>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="title">{{__('Titre (En)')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="title_en" type="text" value="{{$news->title_en}}" placeholder="{{__('message.event.title-info-en')}}" required>
                                </div>
                                <div class="form-group col-md-4" id="title-fr" style="display: block">
                                    <label for="title">{{__('Titre (Fr)')}}</label>
                                    <input class="form-control" name="title_fr" type="text" value="{{$news->title_fr}}" placeholder="{{__('message.event.title-info-fr')}}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="type">{{__('Catégorie')}} <span style="color: red;">*</span></label>
                                    <select class="form-control {{ $errors->has('type') ? ' has-error' : '' }} js-example-basic-single w-100" name="type" required>
                                        <option value="">Séléctionnez la catégorie*</option>
                                        <option value="0" @if($news->type == 0) selected @endif>Actualité</option>
                                        <option value="1" @if($news->type == 1) selected @endif>Article</option>
                                        <option value="2" @if($news->type == 2) selected @endif>Ouvrage</option>
                                        <option value="3" @if($news->type == 3) selected @endif>Facebook</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="summary_en">{{__('Description (En)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_en" class="form-control" name="summary_en" data-value="{{$news->summary_en}}"  required>{{$news->summary_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="summary_fr">{{__('Description (Fr)')}} <span style="color: red;">*</span></label>
                                    <textarea id="summary_fr" class="form-control" name="summary_fr"  data-value="{{$news->summary_fr}}"   required>{{$news->summary_fr}}</textarea>
                                </div>
                            </div>
                            <h3 class="formh2">2. Image (Aperçu) <span class="explanation">Image will automatically be redimensioned to 720w x 965h</span></h3>
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
                                <img src="{{asset('frontend/images/publications/'.$news->images)}}" style="width: 250px;height:200px;" id='img-upload'/>
                            </div>
                            <h3 class="formh2">3. {{__('labels.images')}}</h3>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="col-form-label">{{__('Selectionnez le fichier')}} (<span style="font-weight: bold;" class="explanation">{{__('Use to attach to publications')}}</span>)</label>
                                <div class="file-loading">
                                    <input id="input-documents" name="document" type="file" accept="application/pdf,application/vnd.ms-excel">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <iframe src ="{{asset('documents/'.$news->document)}}" style="width:100%; height:400px;"></iframe>
                            </div>
                        </div>
                            <div style="text-align: center">
                                <button id="submit-button" type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('news.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
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

