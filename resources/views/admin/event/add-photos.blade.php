@extends('layouts.backend.admin')

@section('title', __('labels.project.creation'))
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.project.photos-uploads')}}</h4>
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
                        @if (Session::get('status') == 'info')
                            <div class="alert alert-info alert-block" style="/*padding-top: 50px; */text-align: center;">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>
                        @endif
                        {!! Form::open(['route' => 'project.add.photos.save', 'files'=>true, 'class' => 'forms-sample']) !!}
                        <div class="row">
                                <div class="form-group col-md-12">
                                   <label for="project">{{__('labels.project.index')}} <span style="color: red;">*</span></label>
                                    <select class="form-control {{ $errors->has('project') ? ' has-error' : '' }} js-example-basic-single w-100" name="projectId" required>
                                            <option value="">{{__('labels.project.select')}}</option>
                                            @foreach($projects as $project)
                                                <option value="{{$project->id}}">{{$project->title}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            @include('extension.image')
                            <div style="text-align: center">
                              <button type="submit" id="projectSubmit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                              <a href="{{mob_route('project.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $("#input-images").fileinput({
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ["jpg", "png", "gif"],
                showCaption: true,
                showRemove: false,
                showUpload: false
            });
        })
    </script>

@endsection

