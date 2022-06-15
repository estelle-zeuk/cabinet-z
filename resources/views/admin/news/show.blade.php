@extends('layouts.backend.admin')

@section('title', __('labels.job.job-management'))
@section('css')
    <style>
        .formh2{
            margin-left: -30px;
            margin-right: -30px;
            padding: 15px 30px 15px 30px;
            border-bottom: solid 1px #E2E2E2;
            margin-bottom: 10px;
            font-weight: bold;
            text-transform: capitalize;
            text-transform: uppercase;
            font-size: 16px;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="formh2" style="text-align: center;">Detail de publication: Ref: {{$news->code}}</h3>
                    <fieldset>
                        <ul class="list-unstyled" style="font-weight: bold;">
                            <li>{{__('Titre (En) ')}}: {{$news->title_en}}</li>
                            <li>{{__('Titre (Fr) ')}}: {{$news->title_fr}}</li>
                        </ul>
                    </fieldset>
                    <h3 class="formh2">{{__('Description En')}}</h3>
                    <div class="col-md-12">
                        {!! $news->summary_en !!}
                    </div>
                    <h3 class="formh2">{{__('Description Fr')}}</h3>
                    <div class="col-md-12">
                        {!! $news->summary_fr !!}
                    </div>
                    <h3 class="formh2" {{--style="text-align: center;"--}}>{{__('Aperçu de l\'Image et Document ')}}</h3>
                    <div class="form-group row col-md-12">
                        <div class="form-group col-md-4">
                            <img src="{{asset('frontend/images/publications/'.$news->images)}}" style="width: 250px;height:300px;"/>
                        </div>
                        <div class="form-group col-md-8">
                            <iframe src ="{{asset('documents/'.$news->document)}}" style="width:100%; height:400px;"></iframe>
                        </div>
                    </div>

                    <div style="text-align: center">
                        <a href="{{mob_route('news.index')}}" class="btn btn-light">{{__('buttons.back')}}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Custom js for this page-->
    <script src="{{asset('backend/js/alerts.js')}}"></script>
    <script src="{{asset('backend/js/avgrund.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <!-- End custom js for this page-->
@endsection


