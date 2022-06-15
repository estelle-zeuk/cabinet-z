@extends('layouts.backend.admin')

@section('title', __('labels.report.report-show',['name'=>$report->title]))
@section('css')
    <style>
        .formh2{
            margin-left: -30px;
            margin-right: -30px;
            padding: 5px 30px 15px 30px;
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
                    <h3 class="formh2" style="text-align: center;">{{__('labels.report.index')}} : {{$report->title}}</h3>
                    <fieldset>
                        <ul class="list-unstyled" style="font-weight: bold;">
                            <li>{{__('labels.report.code')}}: {{$report->code}}</li>
                            @if($report->project) <li>{{__('labels.report.index')}}: {{$report->project->title}}</li> @else {{__('labels.report.index')}}: Year Report @endif
                            <li>{{__('labels.report.year')}}: {{$report->year}}</li>
                            <li>{{__('labels.report.created-edited-by')}}: {{getTableById('workers',getTableById('users',$report->user_created_id)->workers_id)->name.' '.getTableById('workers',getTableById('users',$report->user_created_id)->workers_id)->surname}}</li>
                            <li>{{__('labels.report.public-view')}}: @if($report->is_published == 0) No @else Yes @endif</li>
                        </ul>
                    </fieldset>
                    <h3 class="formh2" {{--style="text-align: center;"--}}>{{__('labels.report.documents')}}</h3>
                    @if(count($documents)==1)
                        <div class="col-sm-12 col-md-12 col-lg-12">
                             <iframe src ="{{asset('upload/reports/'.$documents[0])}}" style="width:100%; height:400px;" frameborder="0"></iframe>
                        </div>
                    @else
                        <div class="row">
                            @foreach($documents as $document)
                                <div class="col-md-6">
                                    <iframe src ="{{asset('upload/reports/'.$document.'#toolbar=0')}}" style="width:100%; height:400px;" frameborder="0"></iframe>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


