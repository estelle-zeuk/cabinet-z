@if (Session::get('status') == 'success')
    <div class="alert alert-success alert-block" style="text-align: center;">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-info alert-block" style="text-align: center;">
        <strong>{{$errors->first()}}</strong>
    </div>
@endif
@if (Session::get('status') == 'danger')
    <div class="alert alert-danger alert-block" style="/*padding-top: 50px; */text-align: center;">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif

@if (Session::get('status') == 'info')
    <div class="alert alert-info alert-block" style="/*padding-top: 50px; */text-align: center;">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif

@if (Session::get('status') == 'warning')
    <div class="alert alert-warning alert-block" style="/*padding-top: 50px; */text-align: center;">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif
