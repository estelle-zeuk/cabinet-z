@extends('layouts.backend.admin')

@section('title', __('Gestion des produits'))
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center">
                        <h4 class="card-title">{{__('Gestion des Article')}}</h4>
                    </div>
                    <x-alert/>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div style="text-align: right">
                                <a href="{{mob_route('product.create')}}" class="btn btn-primary btn-fw">{{__('Ajoute Article')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Etat Pub</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ml-3">
                                                    <p class="mb-2">{{$product->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @if($product->is_published == 0)
                                                <i class="fa fa-eye-slash"></i>
                                            @else
                                                <i class="fa fa-eye"></i>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="row">
                                                <div class="dropdown">
                                                    <button class="btn btn-warning icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                         <a href="{{mob_route('product.show',$product->id)}}" class="dropdown-item">
                                                             <i class="icon-eye text-primary"></i> {{__('Prevu')}}
                                                         </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{mob_route('product.edit',$product->id)}}" class="dropdown-item">
                                                            <i class="icon-pencil text-primary"></i> {{__('Edition')}}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @if($product->is_published == 0)
                                                            <a href="{{mob_route('product.publish',$product->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye text-primary"></i> {{__('Publier')}}
                                                            </a>
                                                        @else
                                                            <a href="{{mob_route('product.un-publish',$product->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye-slash text-primary"></i> {{__('Dépublier')}}
                                                            </a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id]]) !!}
                                                        <button class="dropdown-item" type="submit" href="Veuillez vous vraiment supprimer cet article?"  onclick="return confirm($(this).attr('href'))">
                                                            <i class="icon-close text-danger"></i> {{__('Supprimer')}}
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection
