@extends('layouts.backend.admin')

@section('title', __('labels.department-create'))
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.testimony.editing')}}</h4>
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
                        {!! Form::model($testimony, ['route' => ['testimony.update', $testimony->id], 'method' => 'put', 'class' => 'forms-sample','files'=>true]) !!}
                        <div class="form-group col-md-12">
                            <label for="name" class="col-form-label">{{__('labels.name')}}<span style="color: red; font-weight: bold;"> *</span></label>
                            <input class="form-control" name="name" type="text" value="{{$testimony->name}}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="video_link" class="col-form-label">{{__('labels.video-link')}}</label>
                            <input class="form-control" name="video_link" type="text" value="{{$testimony->video_link}}" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description" class="col-form-label">{{__('labels.description')}}<span style="color: red; font-weight: bold;"> *</span></label>
                            <textarea {{ $errors->has('description') ? 'has-error' : '' }} name="description" data-value="{{$testimony->description}}" id="description" style="width: 100%" required>{{$testimony->description}}</textarea>
                            {!! $errors->first('description', '<small style="color: red;">:message</small>') !!}
                            <span class="explanation">Max character 100</span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="salary" class="col-form-label">{{__('labels.add-photo')}} </label>
                                <input type="file" name="avatar" class="dropify" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="salary" class="col-form-label">Current photo </label>
                                <img class="form-control" style="height: 190px; width: 250px;" src="{{asset('upload/testimonies/'.$testimony->avatar)}}" id='img-upload'/>
                            </div>
                        </div>

                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                            <a href="{{mob_route('testimony.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/js/dropify.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <!-- End custom js for this page-->

@endsection
