@extends('layouts.frontend')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb3.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <a href="{{url('/shop')}}">
                            <h4>All Foods</h4>
                        </a>
                        <ul>
                            @foreach($menu_categories as $menu_category)
                            <li>
                                <a href="{{ route('shop.index', $menu_category->slug) }}" class="font-weight-bold text-warning">{{ $menu_category->name }}</a>
                                <ul>
                                    @foreach($menu_category->children as $child)
                                    <li class="px-2">
                                        <a class="font-weight-normal" href="{{ route('shop.index', $child->slug) }}" style="color: #b4b4b4,">{{ $child->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <a href="{{url('/shop')}}">
                            <h4>Tags</h4>
                        </a>
                        <div class="sidebar__item__size">
                            @foreach($menu_tags as $menu_tags)
                            <label for="tags">
                                <a class="text-warning font-weight-bold" href="{{ route('shop.tag', $menu_tags->slug) }}">{{ $menu_tags->name }}</a>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Our Products</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <form method="get">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select name="sortingBy" onchange="this.form.submit()">
                                        <option {{ $sorting === 'default'? 'selected' : null }} value="default">Default</option>
                                        <option {{ $sorting === 'popularity'? 'selected' : null }} value="popularity">Popularity</option>
                                        <option {{ $sorting === 'low-high'? 'selected' : null }} value="low-high">Low-High</option>
                                        <option {{ $sorting === 'high-low'? 'selected' : null }} value="high-low">High-Low</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{ $products->total() }}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$product->gallery->first()->getUrl()}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h6>
                                <h5>RP. {{$product->price}}</h5>
                                <br>
                                <a href="{{ route('product.show', $product->slug) }}" class="primary-btn"> BUY </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col">
                        <h5 class="text-center">Product Empty</h5>
                    </div>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection