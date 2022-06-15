
        <div class="row justify-content-center">
            @php $i=1; @endphp
            @foreach(services() as $service)
                <div class="col-sm-6 col-lg-4">
                    <div class="services-item">
                        <div class="top">
                            <a href="{{mob_route('services.detail',$service->code)}}">
                                <img src="{{asset('frontend/images/services/main'.$i.'.jpg')}}" alt="Services">
                            </a>
                        </div>
                        <div class="bottom">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="{{$service->icon}} icon"></i>
                            <h3>
                                @if(strlen($service->title_fr)>25)
                                <a href="{{mob_route('services.detail',$service->code)}}">{{$service->title_fr}}</a>
                                @else
                                    <a href="{{mob_route('services.detail',$service->code)}}">{{$service->title_fr}}</a>
                                <br>
                                <br>
                                @endif
                            </h3>
                            <a class="services-btn" href="{{ mob_route('services.detail', $service->code)}}">
                                {!! __('Plus de détails') !!}
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
                @php $i +=1; @endphp
            @endforeach
        </div>

