<div class="about-area two pt-100 pb-70">
    <div class="about-shape">
        <img src="{{asset('frontend/images/about/shape1.png')}}" alt="Shape">
        <img src="{{asset('frontend/images/about/shape2.png')}}" alt="Shape">
    </div>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{asset('frontend/images/about/main2.jpg')}}" alt="About">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <div class="top">
                            <span class="top-title">À propos de nous</span>
                        </div>
                        <h2>QUI SOMMES-NOUS?</h2>
                        {!! companyInfo()->who_we_are_fr !!}
                    </div>
                    <div class="section-title">
                        <div class="top">
                            <span class="top-title">NOTRE VISION</span>
                        </div>
                        <h2>NOTRE VISION</h2>
                        {!! companyInfo()->vision !!}
                    </div>
                    <a class="common-btn" href="{!! mob_route('services') !!}">
                        <span class="one"></span>
                        <span class="two"></span>
                        {!! __('Nos Services') !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
