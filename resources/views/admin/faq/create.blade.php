@extends('layouts.backend.admin')

@section('title', __('labels.faq.creation'))
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('labels.faq.creation')}}</h4>
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
                        {!! Form::open(['route' => 'faq.store', 'files'=>true, 'id'=>'reportForm', 'class' => 'forms-sample']) !!}
                        <div class="row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="question_en" class="col-form-label">{{__('labels.question-en')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea {{ $errors->has('question_en') ? 'has-error' : '' }} class="form-control" name="question_en" style="width: 100%" required></textarea>
                                {!! $errors->first('question_en', '<small style="color: red;">:message</small>') !!}
                                <a href="#" onclick="$(this).hide(); $('#question_fr').show(); return false;" style="display: block; margin-bottom: 20px; font-weight: bold;"><strong>+</strong> {{__('labels.question-fr')}}</a>
                            </div>
                            <div class="form-group col-md-12" id="question_fr" style="display: none;">
                                <label for="question_fr" class="col-form-label">{{__('labels.question-fr')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea {{ $errors->has('question_fr') ? 'has-error' : '' }} class="form-control" name="question_fr" style="width: 100%" ></textarea>
                                {!! $errors->first('question_en', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-12">
                                <label for="answer_en" class="col-form-label">{{__('labels.answer-en')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea {{ $errors->has('answer_en') ? 'has-error' : '' }} class="form-control" name="answer_en" style="width: 100%" required></textarea>
                                {!! $errors->first('answer_en', '<small style="color: red;">:message</small>') !!}
                                <a href="#" onclick="$(this).hide(); $('#answer_fr').show(); return false;" style="display: block; margin-bottom: 20px; font-weight: bold;"><strong>+</strong> {{__('labels.answer-fr')}}</a>
                            </div>
                            <div class="form-group col-md-12" id="answer_fr" style="display: none;">
                                <label for="answer_fr" class="col-form-label">{{__('labels.answer-fr')}}<span style="color: red; font-weight: bold;"> *</span></label>
                                <textarea {{ $errors->has('question_fr') ? 'has-error' : '' }} class="form-control" name="answer_fr" style="width: 100%" ></textarea>
                                {!! $errors->first('answer_fr', '<small style="color: red;">:message</small>') !!}
                            </div>
                            <div class="col-md-12" style="text-align: center">
                                <button type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                <a href="{{mob_route('faq.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
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

