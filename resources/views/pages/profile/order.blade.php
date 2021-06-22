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
                            <li><a href="{{url('/category/'.$row->id)}}">{{$row->category_name}}</a></li>
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
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>My Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

<div class="container">
    <div class="row">
  <div class="col-sm-4">
    @include('pages.profile.inc.sidebar')
  </div>
  <div class="col-sm-8">
    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">My Order List</h6>
              </div>

                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-5p">Sl</th>
                        <th class="wd-15p">Invoice No</th>
                        <th class="wd-10p">Payment Type</th>
                        <th class="wd-10p">Sub Total</th>
                        <th class="wd-10p">Total</th>
                        <th class="wd-10p">action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($orders as $order)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>#{{$order->invoice_no}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->subtotal}}</td>
                        <td>{{$order->total}}</td>
                        <td><a href="{{url('order-view/'.$order->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>


    </div>
  </div>
</div>
</div>
@endsection
