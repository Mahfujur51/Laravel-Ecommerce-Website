@extends('layouts.frontend_master');

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        @php
                            $category = App\Category::where('status', 1)->latest()->get();
                        @endphp

                        <ul>
                        @foreach($category as $row)
                            <li><a href="{{url('category/'.$row->id)}}">{{$row->category_name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+01767100058</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Search Page</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Search Page</span>
                        </div>
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
                            <h4>Department</h4>
                            

                        <ul>
                         @foreach($categories as $row)
                            <li><a href="{{url('category/'.$row->id)}}">{{$row->category_name}}</a></li>
                        @endforeach
                        </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>

                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latest_p as $latest)
                                        <a href="{{url('product/details/'.$latest->id)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset($latest->image_two)}}" alt="" style="width:80px !important">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$latest->product_name}}</h6>
                                                <span>${{$latest->price}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latest_p as $latest)
                                        <a href="{{url('product/details/'.$latest->id)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset($latest->image_one)}}" alt="" style="width:80px !important">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$latest->product_name}}</h6>
                                                <span>${{$latest->price}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Search By  "{{$search}}"</h2>
                        </div>
                        <div class="row">
                            @forelse($products as $c_product)
                            
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset($c_product->image_two)}}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{url('add/to-wishlist/'.$c_product->id)}}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <form action="{{url('add/to-cart/'.$c_product->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            
                                            <input type="hidden" name="price" value="{{$c_product->price}}">
                                            
                                        <li><button type="submit" style="border-style:none !important; background-color:white; border-radius:50%; padding:10px"><i class="fa fa-shopping-cart"></i></button></li>
                                    </form>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{url('product/details/'.$c_product->id)}}">{{$c_product->product_name}}</a></h6>
                                        <h5>${{$c_product->price}}</h5>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h4 class="bg-success pt-2 pb-2 pl-5 pr-5 text-white">No Result Found !! Please Try Another Word</h4>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection