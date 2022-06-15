@extends('layouts.backend.admin')

@section('title', __('labels.report.creation'))
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">Editing Member</h4>
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
                        {!! Form::model($member, ['route' => ['team.update', $member->id], 'id'=>'claForm',  'method' => 'PUT', 'class' => 'forms-sample']) !!}
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="full_name"  class="col-form-label">{{__('labels.full_name')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <input class="form-control {{ $errors->has('full_name') ? 'has-error' : '' }}" value="{{$member->full_name}}" name="full_name" style="width: 100%" required>
                                {!! $errors->first('full_name', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">{{__('labels.position')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <input class="form-control {{ $errors->has('position') ? 'has-error' : '' }}" value="{{$member->position}}" name="position" style="width: 100%" required>
                                {!! $errors->first('position', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-3">
                                    <label for="salary" class="col-form-label">{{__('Photo')}} </label>
                                    <input type="file" name="avatar" class="dropify" />
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="contacts" class="col-form-label">{{__('labels.quote')}} </label>
                                    <textarea name="quote" style="height: 200px;" class="form-control" placeholder="Entrez la citation du membre" data-value="{{$member->quote}}" type="text">{{$member->quote}}</textarea>
                                </div>
                            </div>
                            @include('extension.description',$data)
                            <div class="col-md-12" style="text-align: center">
                                <button id="submit-button" type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('team.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {

        })
    </script>

@endsection

