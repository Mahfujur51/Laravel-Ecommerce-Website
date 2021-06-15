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
                            <a href="./index.html">Home</a>
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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="" style="height:100px; width:100px" alt="">
                                        <h5></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form action="" method="post">
                                        @csrf
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="qty" value="">
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Update</button> 
                                            </div>
                                        </form>
                                    </td>
                                    <td class="shoping__cart__total">
                                        
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        
                                        <a href="" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                
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
                
                <div class="col-lg-6">
                    @if(Session::has('coupon'))
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{ url('cupon-apply')}}" method="post">
                                @csrf
                                <input type="text" name="cupon_name" placeholder="Enter your coupon code" value="You Get Discount {{$discount = session()->get('coupon')['coupon_discount']}}%">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{ url('cupon-apply')}}" method="post">
                                @csrf
                                <input type="text" name="cupon_name" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                        <!--Total-->
                        @php 
                        $total = App\Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                            return $t->price * $t->qty;
                        });
                    @endphp
                    <!--Total-->

                    @if(Session::has('coupon'))
                    <li>Subtotal <span>${{$total}}</span></li>
                    <li>Discount <span>{{$discount = session()->get('coupon')['coupon_discount']}}% = ({{($total * $discount)/100}}Tk)</span></li>
                    <li>Total <span>${{$total - ($total * $discount)/100}}</span></li>
                    @else
                    <li>Subtotal <span>${{$total}}</span></li>
                    <li>Total <span>${{$total}}</span></li>
                    @endif
                            
                            
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@endsection