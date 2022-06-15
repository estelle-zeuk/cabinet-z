@extends('layouts.backend.admin')

@section('title', __('Actualité / Evénément'))
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; padding-bottom: 20px;">{{__('Création de Produits')}}</h4>
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
                        {!! Form::open(['route' => 'product.store', 'files'=>true, 'class' => 'forms-sample']) !!}
                            <h3 class="formh2">1. Informations générales</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('Libellé de l\'article')}} <span style="color: red;">*</span></label>
                                    <input class="form-control" name="name" type="text"  required value="leonard">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="prix">{{__('Prix minimum')}}</label>
                                    <input class="form-control" name="price" type="number"  required value="30000">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="prix">{{__('Category')}}</label>
                                    <select name="category" class="form-control"  >
                                        <option value="0">Article</option>
                                        <option value="1">Catalogue</option>
                                    </select>
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
    </div>

@endsection

@section('js')
    <script src="{{asset('backend/js/editorDemo.js')}}"></script>
    <script>
        $(function () {
            $(document).on('change', '.btn-file :file', function(e) {
                e.preventDefault();
                let input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                event.preventDefault();
                let input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log )
                        console.log(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#imgInp').change(function(){
                readURL(this);
            });
        });
    </script>
@endsection

