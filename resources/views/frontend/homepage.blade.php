@extends('layouts.frontend')

@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Foods</span>
                    </div>
                    <ul>
                        <li><a href="#">Rempeyek Kacang Tanah</a></li>
                        <li><a href="#">Rempeyek Kacang Hijau</a></li>
                        <li><a href="#">Rempeyek Teri</a></li>
                        <li><a href="#">Rempeyek Udang</a></li>
                        <li><a href="#">Rempeyek Tempe</a></li>
                        <li><a href="#">Kacang Kapri</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner1hd.png') }}">
                    <div class="hero__text">
                        <span>TRADITIONAL FOODS</span>
                        <h2>Traditional <br />Store</h2>
                        <p>Various Kind of Traditional Foods From <br /> Balinese</p>
                        <a href="{{url('/shop')}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="section-title">
            <h2>Our Categories</h2>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($menu_categories as $menu_category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ $menu_category->photo->getUrl() }}">
                        <h5><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>All Products</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter" id="">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{$product->gallery->first()->getUrl()}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h6>
                        <h5>RP. {{$product->price}}</h5>
                        <br>
                        <a href="{{route('product.show', $product->slug)}}" class="primary-btn"> BUY </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<!-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner End -->

@endsection
