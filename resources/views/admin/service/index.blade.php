@extends('layouts.backend.admin')

@section('title', __('menu.service-management'))
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center">
                        <h4 class="card-title">{{__('Gestion des publications')}}</h4>
                    </div>

                    @if (Session::get('status') == 'success')
                        <div class="alert alert-success alert-block" style="text-align: center;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{Session::get('message')}}</strong>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-info alert-block" style="text-align: center;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{$errors->first()}}</strong>
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
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div style="text-align: right">
                                <a href="{{mob_route('service.create')}}" class="btn btn-primary btn-fw">{{__('buttons.create')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>description (fr)</th>
                                    <th>Public view</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('frontend/images/services/'.$service->image)}}" alt="profile"/>
                                                <div class="ml-3">
                                                    <p class="mb-2">{{$service->title_fr}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{substr($service->summary_fr,0,60).'...'}}</td>
                                        <td>
                                            @if($service->is_published == 0)
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
                                                         <a href="{{mob_route('service.show',$service->id)}}" class="dropdown-item">
                                                             <i class="icon-eye text-primary"></i> {{__('buttons.preview')}}
                                                         </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{mob_route('service.edit',$service->id)}}" class="dropdown-item">
                                                            <i class="icon-pencil text-primary"></i> {{__('buttons.edit')}}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @if($service->is_published == 0)
                                                            <a href="{{mob_route('service.publish',$service->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye text-primary"></i> {{__('buttons.publish')}}
                                                            </a>
                                                        @else
                                                            <a href="{{mob_route('service.un-publish',$service->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye-slash text-primary"></i> {{__('buttons.un-publish')}}
                                                            </a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['service.destroy', $service->id]]) !!}
                                                        <button class="dropdown-item" type="submit" href="Veuillez vous vraiment supprimer?"  onclick="return confirm($(this).attr('href'))">
                                                            <i class="icon-close text-danger"></i> {{__('buttons.delete')}}
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
