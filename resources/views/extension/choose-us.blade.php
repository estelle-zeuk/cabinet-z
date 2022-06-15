<section class="features-area two pt-100 pb-70">
    <div class="features-shape">
        <img src="{{asset('frontend/images/features-shape1.png')}}" alt="Shape">
        <img src="{{asset('frontend/images/features-shape2.png')}}" alt="Shape">
    </div>
    <div class="container">
        <div class="section-title">
            <div class="top">
                <span class="top-title">{!! __('Nous Services') !!}</span>
                <span class="sub-title">{!! __('Nous Services') !!}</span>
            </div>
            <h2>{!! __('Votre vue, notre priorité ...') !!}</h2>
        </div>
        <div class="row">
            @php $i = 1; @endphp
            @foreach(services() as $service)
            <div class="col-sm-6 col-lg-3">
                <div class="features-item">
                    <span>0{{$i++}}</span>
                    <i class="{{$service->icon}} icon"></i>
                    <h3>
                        <a href="{{mob_route('services.detail',$service->code)}}">{{$service->title_fr}}</a>
                    </h3>
                    <a class="features-btn" href="{{ mob_route('services.detail', $service->code)}}">Plus de détails</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
