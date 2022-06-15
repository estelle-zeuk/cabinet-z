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

        .item .btn {
            position: absolute;
            top: 90%;
            left: 76%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #e85b65;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .item .btn:hover {
            background-color: black;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.event.editing',['code'=>$event->title_en])}}</h4>
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
                        {!! Form::model($event, ['route' => ['event.update', $event->id],'id'=>'eventForm','files'=>true, 'method' => 'PUT', 'class' => 'forms-sample']) !!}
                        <h3 class="formh2">1. {{__('labels.project.general')}}</h3>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="code">{{__('labels.code')}} <span style="color: red;">*</span></label>
                                <input class="form-control has-error" name="code" type="text" value="{{$event->code}}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="code">{{__('labels.host-name')}} <span style="color: red;">*</span></label>
                                <input class="form-control" name="host" type="text" value="{{$event->host}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title">{{__('labels.event.title-en')}} <span style="color: red;">*</span></label>
                                <input class="form-control" name="title_en" type="text" value="{{$event->title_en}}" placeholder="{{__('message.event.title-info-en')}}" required>
                            </div>
                            <div class="form-group col-md-3" id="title-fr" style="display: block">
                                <label for="title">{{__('labels.event.title-fr')}}</label>
                                <input class="form-control" name="title_fr" type="text" value="{{$event->title_fr}}" placeholder="{{__('message.event.title-info-fr')}}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title">{{__('labels.event.address')}}<span style="color: red;">*</span></label>
                                <input class="form-control" name="address" type="text" value="{{$event->address}}" placeholder="{{__('message.event.enter-address')}}"  required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title">{{__('labels.start-date')}}<span style="color: red;">*</span></label>
                                <div id="datepicker-popup" class="input-group date datepicker">
                                    <input type="text" class="form-control" name="date" value="{{date('m/d/Y',strtotime($event->date))}}">
                                    <span class="input-group-addon input-group-append border-left">
                                              <span class="icon-calendar input-group-text"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title">{{__('labels.duration')}}<span style="color: red;">*</span></label>
                                <input class="form-control" name="duration" type="number" step="1" value="{{$event->duration}}" placeholder="{{__('message.event.duration')}}"  required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="code">{{__('labels.event.latitude')}} <span style="color: red;">*</span></label>
                                <input class="form-control" name="latitude" type="number" value="{{$event->latitude}}" placeholder="{{__('message.event.enter-latitude')}}" step="any">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title">{{__('labels.event.longitude')}}<span style="color: red;">*</span></label>
                                <input class="form-control" name="longitude" type="number" value="{{$event->longitude}}" placeholder="{{__('message.event.enter-longitude')}}" step="any">
                            </div>
                        </div>
                        <h3 class="formh2">2. {{__('labels.description')}}</h3>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="summary_en">{{__('labels.summary_en')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea  class="form-control {{ $errors->has('summary_en') ? 'has-error' : '' }}"  name="summary_en" id="description" data-value="{{$event->summary_en}}" style="width: 100%" required>{{$event->summary_en}}</textarea>
                                {!! $errors->first('summary_en', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="summary_fr">{{__('labels.summary_fr')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea  class="form-control {{ $errors->has('summary_fr') ? 'has-error' : '' }}"  name="summary_fr" id="summary_fr" style="width: 100%" data-value="{{$event->summary_en}}" required>{{$event->summary_en}}</textarea>
                                {!! $errors->first('summary_fr', '<small style="color: red;">:message</small>') !!}
                            </div>
                        </div>
                        @include('extension.description',$data)

                        <h3 class="formh2">3. {{__('labels.project.photos-uploads')}}</h3>
                        <div class="row thumb-row">
                            @php $images = json_decode($event->images); @endphp
                            @foreach($images as $image)
                                <div class="col-sm-3 col-xs-6">
                                    <div class="thumb-box">
                                        <img style="max-height: 220px;" src="{{asset('images/events/'.$image)}}"/>
                                    </div>
                                    <div class="caption item">
                                        <a href="{{mob_route('event.remove.image',['news'=>$event->id,'image'=>$image])}}" image-name="{{$image}}" class="btn btn-primary">{{__('buttons.delete')}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <br>
                        @include('extension.image')
                        <div style="text-align: center">
                            <button type="submit" id="save-event" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                            <a href="{{mob_route('event.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
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
    <script src="{{asset('backend/js/owl-carousel.js')}}"></script>
    <script src="{{asset('backend/js/editorDemo.js')}}"></script>
    <script>
        $(function () {
            var loading = $('#processing');
            $('.item a').click(function (e) {
                e.preventDefault();

                swal({
                    title: $('#confirm-title').val(),
                    text: $('#confirm-message').val()+' ' +$(this).attr('image-name'),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3f51b5',
                    cancelButtonColor: '#ff4081',
                    confirmButtonText: 'Great ',
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: false,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true,
                        },
                        confirm: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then(function(value){
                        if(value){

                            var url = $('.item a').attr("href");
                            loading.show();
                            $.ajax({
                                url: url,
                                type: 'get',
                                success:function (data) {
                                    loading.hide();
                                    if(data.status){
                                        swal({
                                            title: 'Congratulations',
                                            text: data.message,
                                            icon: 'success',
                                            button: {
                                                text: "Continue",
                                                value: true,
                                                visible: true,
                                                className: "btn btn-primary"
                                            }
                                        }).then(function (value) {
                                            location.reload();
                                        });
                                    }else{
                                        swal({
                                            title: 'Error',
                                            text: data.message,
                                            icon: 'danger',
                                            button: {
                                                text: "OK",
                                                value: true,
                                                visible: true,
                                                className: "btn btn-primary"
                                            }
                                        })
                                    }
                                }
                            });
                        }else{

                        }
                    },
                    function (reject) {
                        alert('reject');
                    }
                );
            });
        });
    </script>

@endsection

