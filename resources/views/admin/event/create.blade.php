@extends('layouts.backend.admin')

@section('title', __('labels.project.creation'))
@section('css')
    <style>
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
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.event.creation')}}</h4>
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
                        {!! Form::open(['route' => 'event.store', 'files'=>true, 'id'=>'eventForm', 'class' => 'forms-sample repeater']) !!}
                        <h3 class="formh2">1.a   {{__('labels.project.general')}}</h3>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="code">{{__('labels.code')}} <span style="color: red;">*</span></label>
                                    <input class="form-control has-error" name="code" type="text" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="code">{{__('labels.host-name')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="host" type="text" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">{{__('labels.event.title-en')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="title_en" type="text" placeholder="{{__('message.event.title-info-en')}}" required>
                                </div>
                                <div class="form-group col-md-3" id="title-fr" style="display: block">
                                    <label for="title">{{__('labels.event.title-fr')}}</label>
                                    <input class="form-control" name="title_fr" type="text" placeholder="{{__('message.event.title-info-fr')}}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">{{__('labels.event.address')}}<span style="color: red;">*</span></label>
                                    <input class="form-control" name="address" type="text" placeholder="{{__('message.event.enter-address')}}"  required>
                                </div>
                                <div class="form-group col-md-3">
                                        <label for="title">{{__('labels.start-date')}}<span style="color: red;">*</span></label>
                                        <div id="datepicker-popup" class="input-group date datepicker">
                                            <input type="text" class="form-control" name="date" value="{{date('m/d/Y')}}">
                                            <span class="input-group-addon input-group-append border-left">
                                              <span class="icon-calendar input-group-text"></span>
                                            </span>
                                        </div>
                                 </div>
                                <div class="form-group col-md-3">
                                    <label for="title">{{__('labels.duration')}}<span style="color: red;">*</span></label>
                                    <input class="form-control" name="duration" type="number" step="1" value="1" placeholder="{{__('message.event.duration')}}"  required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="code">{{__('labels.event.latitude')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="latitude" type="number" placeholder="{{__('message.event.enter-latitude')}}" step="any">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">{{__('labels.event.longitude')}}<span style="color: red;">*</span></label>
                                    <input class="form-control" name="longitude" type="number" placeholder="{{__('message.event.enter-longitude')}}" step="any">
                                </div>
                            </div>
                        <h3 class="formh2">1.b <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                <i class="icon-plus"></i>
                            </button> {{__('labels.add-speakers')}}</h3>
                        <div class="repeater col-md-8" data-repeater-list="group-a">
                            <div data-repeater-item class="d-flex mb-2">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Speaker</span>
                                    </div>
                                    <input type="text" name="list[speaker_name][]"  class="form-control form-control-sm" id="inlineFormInputGroup1" placeholder="Add Speaker Full name">
                                </div>
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Speaker avatar</span>
                                    </div>
                                    <input type="file" class="form-control form-control-sm" name="list[speaker_avatar]" >
                                </div>
                                <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                    <i class="icon-close"></i>
                                </button>
                            </div>
                        </div>
                        <h3 class="formh2">2. {{__('labels.description')}}</h3>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="summary_en">{{__('labels.summary_en')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea  class="form-control {{ $errors->has('summary_en') ? 'has-error' : '' }}"  name="summary_en" id="description" style="width: 100%" required></textarea>
                                {!! $errors->first('summary_en', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="summary_fr">{{__('labels.summary_fr')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea  class="form-control {{ $errors->has('summary_fr') ? 'has-error' : '' }}"  name="summary_fr" id="summary_fr" style="width: 100%" required></textarea>
                                {!! $errors->first('summary_fr', '<small style="color: red;">:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="problem">{{ __('labels.event.description-en') }}<span style="color: red; font-weight: bold;"> *</span></label>
                            <div class="col-md-12" id="description-en">

                            </div>
                            <input id="description_en" type="hidden" name="description_en">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="problem">{{ __('labels.event.description-fr') }}<span style="color: red; font-weight: bold;"> *</span></label>
                            <div class="col-md-12" id="description-fr">

                            </div>
                            <input id="description_fr" type="hidden" name="description_fr">
                        </div>

                        <h3 class="formh2">3. {{__('labels.project.photos-uploads')}}</h3>
                            @include('extension.image')
                           <div style="text-align: center">
                                <button type="submit" class="btn btn-primary mr-2" id="save-event">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('event.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
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

@endsection

