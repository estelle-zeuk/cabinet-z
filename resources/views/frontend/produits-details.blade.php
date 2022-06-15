@extends('layouts.frontend.app')
@section('title','Welcome')

@section('css')
	<style>


        .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
        .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px;}
        .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
        .MultiCarousel .leftLst { left:0; }
        .MultiCarousel .rightLst { right:0; }

        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }

	</style>

@endsection

@section('content')

    <div class="page-title-area title-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>{!! __('Boutique') !!}</h2>
                        <ul>
                            <li>
                                <a href="{{mob_route('welcome')}}">{!! __('Accueil') !!}</a>
                            </li>
                            <li>
                                <span>{!! __('Boutique') !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-details-area ptb-100">
        <div class="container">
            <x-alert/>
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="details-img">
                        <img src="{{asset('frontend/images/shop/'. json_decode($product->image)[0])}}" alt="Shop">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="details-content">
                        <form action="{{mob_route('billing')}}" method="post" {{--id="command-form"--}}>
                            @csrf
                        <div class="billing">
                            <input type="hidden" name="imageUrl" value="{{asset('frontend/images/shop/'. json_decode($product->image)[0])}}">
                            <h3>{!! __('Demande de devis') !!}</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{!! __('Prénom*') !!}</label>
                                        <input type="text" class="form-control" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{!! __('Nom*') !!}</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{!! __('Email*') !!}</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{!! __('Téléphone*') !!}</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{!! __('Message*') !!}</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Écrire un message" required data-error="Écrire un message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <br>
                        <button class="common-btn" type="submit">
                            <span class="one"></span>
                            <span class="two"></span>
                            {!! __('Demande de devis') !!}
                        </button>
                        <br>
                        </form>
                        <ul class="social-links">
                            <li>
                                <span>{!! __('Partager') !!}:</span>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="describe-area">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{!! __('Description') !!}</button>
                    </li>
                </ul>
                {{--<div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <p>{{$product->description_fr}}</p>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

    <hr style="margin-left:100px; margin-right:100px;"><br>
<section class="shop-area pb-70">
	<div class="container">
		<!-- /Multiple Cards -->
        <div class="section-title">
            <h2>{!! __('Produits liés') !!}</h2>
        </div>

        <!-- /Multiple Cards -->
        <div class="container">
            <div class="row">
                <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach($products as $product)
                        <div class="item">
                            <div class="shop-item">
                                <h4>Nouveau</h4>
                                <div class="top" style="padding: 0 !important;">
                                    <img src="{{asset('frontend/images/shop/'. json_decode($product->image)[0])}}" alt="Shop">
                                    <ul>
                                        <li><a class="popup" href="{{asset('frontend/images/shop/'. json_decode($product->image)[0])}}"><i class='flaticon-view'></i></a></li>
                                        <li><a href="#" class="add-to-cart" data-identity="{{$product->code}}" data-label="{{$product->name}}" data-price="{{$product->price}}"><i class="flaticon-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="bottom">
                                    <h3><a href="{{route('product.details', $product->id)}}">@if($product->category == 0){!! __('Voir plus') !!} @else {!! $product->name !!} @endif</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <button class="btn btn-primary leftLst" style="background-color: #3d2b9b;"><</button>
                    <button class="btn btn-primary rightLst" style="background-color: #3d2b9b;">></button>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
	</script>
@endsection
