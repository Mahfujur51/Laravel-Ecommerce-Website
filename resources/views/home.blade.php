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
    <div class="card">
        <div class="card-header bg-success text-white">
                <h6 class="card-body-title text-white"> Profile</h6>
              </div>
      <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Emaile</label>
                <input type="email" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{Auth::user()->email}}">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
