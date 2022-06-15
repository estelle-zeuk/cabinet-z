@extends('layouts.backend.admin')

@section('title', __('labels.post-create'))
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
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.post-creation')}}</h4>
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
                        {!! Form::open(['route' => 'duty-post.store', 'class' => 'forms-sample']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department_id">{{__('labels.department')}} *</label>
                                        <select class="form-control {{ $errors->has('city_id') ? ' has-error' : '' }} js-example-basic-single w-100" name="department_id" required>
                                            <option value="">{{__('message.department.select')}}*</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="code" class="col-form-label">{{__('labels.code')}} *</label>
                                    <input class="form-control" name="code" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{__('labels.name')}} *</label>
                                            <input class="form-control" name="name" type="text" required>
                                        </div>
                                    </div>
                                </div>

                                <div style="text-align: center">
                                <button type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('duty-post.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Custom js for this page-->
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <!-- End custom js for this page-->

@endsection

