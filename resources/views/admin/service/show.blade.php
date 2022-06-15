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
                    <h3 class="formh2" style="text-align: center;">Detail du service : {{str_replace('-',' ',$service->code)}}</h3>
                    <h3 class="formh2">1. Informations générales</h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">{{__('Titre (En)')}} <span style="color: red;">*</span></label>
                            <input class="form-control" name="title_en" type="text" value="{{$service->title_en}}" readonly>
                        </div>
                        <div class="form-group col-md-6" id="title-fr" style="display: block">
                            <label for="title">{{__('Titre (Fr)')}}</label>
                            <input class="form-control" name="title_fr" type="text" value="{{$service->title_fr}}"  readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="summary_en">{{__('Brève description(En)')}} <span style="color: red;">*</span></label>
                            <textarea id="summary_en" class="form-control" name="summary_en" data-value="{{$service->summary_en}}"  readonly>{{$service->summary_en}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="summary_fr">{{__('Brève description (Fr)')}} <span style="color: red;">*</span></label>
                            <textarea id="summary_fr" class="form-control" name="summary_fr"  data-value="{{$service->summary_fr}}"   readonly>{{$service->summary_fr}}</textarea>
                        </div>
                    </div>
                    <h3 class="formh2">2. Description détaillée (En)</h3>
                    {!! $service->description_en !!}
                    <h3 class="formh2">2. Description détaillée (Fr)</h3>
                    {!! $service->description_fr !!}
                    <h3 class="formh2">3. Image (Aperçu) <span class="explanation">Image will automatically be redimensioned to 371w x 255h</span></h3>
                    <div class="form-group">
                        <img src="{{asset('frontend/images/services/'.$service->image)}}" style="width: 371px;height:255px;" id='img-upload'/>
                    </div>
                    <h3 class="formh2">4. Document (Piece joindre)</h3>
                    <div class="row col-md-12">
                        @if($service->document)
                                <iframe src ="{{asset('documents/'.$service->document)}}" style="width:100%; height:600px;"></iframe>
                        @endif
                    </div>

                    <div style="text-align: center">
                        <a href="{{mob_route('service.index')}}" class="btn btn-light">{{__('buttons.back')}}</a>
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


