<div class="owl-carousel owl-theme nav-bottom rounded-nav numbered-dots pl-1 pr-1" data-plugin-options="{'items': 1, 'loop': false, 'dots': true, 'nav': false}">
    @php $i = 0; @endphp
    @foreach(getTableByAttribute('services','type',2) as $news)
        @php $i++; @endphp
        <div>
            <div class="custom-step-item">
											<span class="step text-uppercase">
												{{--{{__('message.stage')}}--}}
												<span class="step-number text-color-primary">
													@if(strlen($i)== 1) {{'0'.$i}} @else {{$i}} @endif
												</span>
											</span>
                <div class="step-content">
                    <h4 class="mb-3">{!! convertDateFr($news->date,"j F Y") !!}<br> <strong>{!! $news->title_fr !!}</strong></h4>
                    <p>{!! $news->summary_fr !!}</p>
                    <a class="btn btn-outline custom-border-width btn-primary mt-3 mb-2 custom-border-radius font-weight-semibold text-uppercase" href="{{mob_route('my.news',$news->code)}}">Plus Info</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
