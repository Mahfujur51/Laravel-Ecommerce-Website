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
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Check Out</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>CheckOut</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

     <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Shipping Details</h4>
                <form action="{{route('place.order')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="shipping_first_name" value="{{Auth::user()->name}}">
                                    </div>
                                    @error('shipping_first_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="shipping_last_name">
                                    </div>
                                    @error('shipping_last_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="shipping_phone">
                                    </div>
                                    @error('shipping_phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="shipping_email" value="{{Auth::user()->email}}">
                                    </div>
                                    @error('shipping_email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    <p>State<span>*</span></p>
                                    <input type="text" name="shipping_state">
                                    </div>
                                    @error('shipping_state')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Postcode / ZIP<span>*</span></p>
                                        <input type="text" name="post_code">
                                    </div>
                                    @error('post_code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="shipping_address">
                            </div>
                            @error('shipping_address')
                                    <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            
                            
                           
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products<span>Total</span></div>
                                <ul>
                                    @foreach($cart as $carts)
                                    <li>{{$carts->product->product_name}} ({{$carts->qty}}) <span>${{$carts->price * $carts->qty}}</span></li>
                                    @endforeach

                                    @php 
                                        $total = App\Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                                            return $t->price * $t->qty;
                                        });
                                    @endphp
                                <div class="checkout__order__subtotal">Subtotal <span>${{$total}}</span></div>
                                @if(Session::has('coupon'))
                                <div class="checkout__order__total">Discount <span>${{($total * session()->get('coupon')['coupon_discount'])/100}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$total - ($total * session()->get('coupon')['coupon_discount'])/100}}</span></div>

                                <input type="hidden" name="subtotal" value="{{$total}}">
                                <input type="hidden" name="coupon_discount" value="{{ session()->get('coupon')['coupon_discount']}}">
                                <input type="hidden" name="total" value="{{$total - ($total * session()->get('coupon')['coupon_discount'])/100}}">


                                @else
                                <div class="checkout__order__subtotal">Total <span>${{$total}}</span></div>
                                <input type="hidden" name="subtotal" value="{{$total}}">
                                <input type="hidden" name="total" value="{{$total}}">
                                @endif
                                <h4>Select Payment Method</h4>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Hand Cash
                                        <input type="checkbox" id="payment" value="Handcash" name="payment_type">
                                        @error('payemnt_type')
                                    <span class="text-danger">{{$message}}</span>
                            @enderror
                                        <span class="checkmark"></span>
                                        
                                    </label>
                                    
                                </div>

                                <div class="checkout__input__checkbox">
                                    <label>
                                        Paypal
                                        <input type="checkbox"  value="Paypal" name="payment_type">
                                        @error('payemnt_type')
                                    <span class="text-danger">{{$message}}</span>
                            @enderror
                                        <span class="checkmark"></span>
                                        
                                    </label>
                                    
                                </div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    @endsection