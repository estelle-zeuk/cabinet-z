<div class="form-group col-md-12">
    <label for="problem">@if(isset($data['label_fr'])) {!! $data['label_fr'] !!}  @else Description(Fr) @endif <span style="color: red; font-weight: bold;"> *</span></label>
    <div class="col-md-12" id="description-fr">
        @if(isset($data['description_fr']))
            @if($data['description_fr'])
                {!! $data['description_fr'] !!}
            @endif
        @endif
    </div>
    <input id="description_fr" type="hidden" @if(isset($data['fieldNameFr'])) name="{{$data['fieldNameFr']}}" @else name="description_fr" @endif>
</div>

<div class="form-group col-md-12">
    <label for="problem">@if(isset($data['label_en'])) {!! $data['label_en'] !!}  @else Description(En) @endif<span style="color: red; font-weight: bold;"> *</span></label>
    <div class="col-md-12" id="description-en">
        @if(isset($data['description_en']))
            @if($data['description_en'])
                {!! $data['description_en'] !!}
            @endif
        @endif
    </div>
    <input id="description_en" type="hidden" @if(isset($data['fieldNameEn']))  name="{{$data['fieldNameEn']}}" @else name="description_en" @endif>
</div>
@section('extensionJS')
    <script src="{{asset('backend/js/editorDemo.js?v='.time())}}"></script>
@endsection
