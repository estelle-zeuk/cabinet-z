@extends('layouts.backend.admin')

@section('title', 'titles.department')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center">
                        <h4 class="card-title">{{__('menu.duty-post-management')}}</h4>
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
                                <a href="{{mob_route('duty-post.create')}}" class="btn btn-primary btn-fw">{{__('buttons.create')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0; @endphp
                                @foreach($posts as $post)
                                    @php $i += 1; @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$post->department->name}}</td>
                                        <td>{{$post->code}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>
                                            @if($post->status == 0)
                                            <label class="badge badge-danger">Inactive</label>
                                            @else
                                            <label class="badge badge-success">Active</label>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="row">
                                                <div style="padding-right: 5px;">
                                                    <a href="{{mob_route('duty-post.edit',$post->id)}}" class="btn btn-light">
                                                        <i class="icon-pencil text-primary"></i>Edit
                                                    </a>
                                                </div>
                                                <div>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['duty-post.destroy', $post->id]]) !!}
                                                    <button class="btn btn-light" type="submit"  onclick="return confirm('Do you really want to delete?')">
                                                        <i class="icon-close text-danger"></i>Remove
                                                    </button>
                                                    {!! Form::close() !!}
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
