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
                            <li><a href="#">{{$row->category_name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
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
                        <h2>Wish List</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Add To Cart</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlist as $carts)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset($carts->product->image_one)}}" style="height:100px; width:100px" alt="">
                                        <h5>{{$carts->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{$carts->product->price}}
                                    </td>
                                    <td>
                                         <form action="{{url('add/to-cart/'.$carts->product_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        
                                        <input type="hidden" name="price" value="{{$carts->product->price}}">
                                        
                                    <button  class="btn btn-sm btn-success" type="submit"><i class="fa fa-shopping-cart"></i> Cart</button>
                                </form>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        
                                        <a href="{{url('delete-wishlist/'.$carts->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@endsection