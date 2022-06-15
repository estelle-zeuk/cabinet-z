@extends('layouts.backend.admin')

@section('title', __('labels.project.creation'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">Edition du produit</h4>
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
                        {!! Form::model($product, ['route' => ['product.update', $product->id], 'files'=>true, 'method' => 'PUT', 'class' => 'forms-sample']) !!}
                                <h3 class="formh2">1. Informations générales</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="title">{{__('Libellé de l\'article')}} <span style="color: red;">*</span></label>
                                        <input class="form-control" name="name" type="text"  required value="{{$product->name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prix">{{__('Prix minimum')}}</label>
                                        <input class="form-control" name="price" type="number"  required value="{{$product->price}}">
                                    </div>
                                </div>
                                <h3 class="formh2">2. Description détaillée</h3>
                                @include('extension.description',$data)

                                <h3 class="formh2">3. {{__('labels.images')}}</h3>
                                @include('extension.image')
                                <div style="text-align: center">
                                    <button type="submit" class="btn btn-primary mr-2">{{__('buttons.submit')}}</button>
                                    <a href="{{mob_route('product.index')}}" class="btn btn-light">{{__('buttons.cancel')}}</a>
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
    <script src="{{asset('backend/js/editorDemo.js')}}"></script>
@endsection

