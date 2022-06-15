@extends('layouts.backend.admin')

@section('title', __('menu.testimony'))
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center">
                        <h4 class="card-title">{{__('menu.testimony')}}</h4>
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
                                <a href="{{mob_route('testimony.create')}}" class="btn btn-primary btn-fw">{{__('buttons.create')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0; @endphp
                                @foreach($testimonies as $testimony)
                                    @php $i += 1; @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="py-1 pl-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('upload/testimonies/'.$testimony->avatar)}}" alt="profile"/>
                                                <div class="ml-3">
                                                    <p class="mb-2">{{$testimony->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{substr($testimony->description,0,140).'...'}}</td>
                                        <td>
                                            @if($testimony->is_published == 0)
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
                                                       {{-- <a href="{{mob_route('jobs.show',$job->id)}}" class="dropdown-item">
                                                            <i class="icon-eye text-primary"></i> {{__('buttons.preview')}}
                                                        </a>--}}
                                                        <a href="{{mob_route('testimony.edit',$testimony->id)}}" class="dropdown-item">
                                                            <i class="icon-pencil text-primary"></i> {{__('buttons.edit')}}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @if($testimony->is_published == 0)
                                                            <a href="{{mob_route('testimony.publish',$testimony->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye text-primary"></i> {{__('buttons.publish')}}
                                                            </a>
                                                        @else
                                                            <a href="{{mob_route('testimony.un.publish',$testimony->id)}}" class="dropdown-item">
                                                                <i class="fa fa-eye-slash text-primary"></i> {{__('buttons.un-publish')}}
                                                            </a>
                                                        @endif
                                                        @if(\Auth::user()->id == $testimony->user_created_id)
                                                            <div class="dropdown-divider"></div>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['testimony.destroy', $testimony->id]]) !!}
                                                            <button class="dropdown-item" type="submit" href="{{__('message.job.delete-confirmation-info')}}"  onclick="return confirm($(this).attr('href'))">
                                                                <i class="icon-close text-danger"></i> {{__('buttons.delete')}}
                                                            </button>
                                                            {!! Form::close() !!}
                                                        @endif
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
    <!-- Custom js for this page-->
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <!-- End custom js for this page-->
@endsection
