@extends('layouts.backend.admin')

@section('title', __('menu.project-management'))
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center">
                        <h4 class="card-title">{{__('menu.faq-management')}}</h4>
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
                                <a href="{{mob_route('faq.create')}}" class="btn btn-primary btn-fw">{{__('buttons.create')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th style="width: 60px;">Public view</th>
                                    <th style="width: 60px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0; @endphp
                                @foreach($faqs as $faq)
                                    @php $i += 1; @endphp
                                    <tr>
                                        <td style="width: 10px;">{{$i}}</td>
                                        <td>{{substr($faq->question_en,0,100).'...'}}</td>
                                        <td>{{substr($faq->answer_en,0,100).'...'}}</td>
                                        <td style="width: 60px; text-align: center;">
                                            @if($faq->is_published == 0)
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
                                                         <a question="{{$faq->question_en}}" answer="{{$faq->answer_en}}" href="#" class="dropdown-item show-faq">
                                                             <i class="icon-eye text-primary"></i> {{__('buttons.show-details')}}
                                                         </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{mob_route('faq.edit',$faq->id)}}" class="dropdown-item">
                                                            <i class="icon-pencil text-primary"></i> {{__('buttons.edit')}}
                                                        </a>
                                                        @if(\Auth::user()->id == $faq->user_created_id)
                                                            <div class="dropdown-divider"></div>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['faq.destroy', $faq->id]]) !!}
                                                            <button class="dropdown-item" type="submit" href="{{__('message.faq.delete-confirmation-info')}}"  onclick="return confirm($(this).attr('href'))">
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
    <script src="{{asset('backend/js/data-table.js')}}"></script>
    <script>
        $(function () {
            $(document).on('click', '.show-faq', function (event) {
                var question = $(this).attr('question');
                var answer = $(this).attr('answer');
                swal({
                    title: 'FAQ Details',
                    html: 'I will close in <b></b> milliseconds.',
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                })
            });
        })
    </script>
@endsection
