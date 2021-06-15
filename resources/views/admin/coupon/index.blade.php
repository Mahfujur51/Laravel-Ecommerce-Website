@extends('admin.admin_master')
@section('coupon') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-8">    
              <div class="card">
              <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Coupon List</h6>
              </div>
                 
                <br>   
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Sl</th>
                        <th class="wd-15p">Coupon Name</th>
                        <th class="wd-15p">Discount</th>
                        <th class="wd-20p">Status</th>  
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($coupons as $coupon)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->discount }}%</td>
                        <td>
                            @if($coupon->status == 1)
                            <span class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> Active</span>
                            @else 
                            <span class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/coupon/edit/'.$coupon->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ url('admin/coupon/delete/'.$coupon->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            @if($coupon->status == 1)
                            <a href="{{ url('admin/coupon/inactive/'.$coupon->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i> Inactive</a>
                            @else
                            <a href="{{ url('admin/coupon/active/'.$coupon->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i> Active</a>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Add Coupon
                </div>

                <div class="card-body">

                    <form action="{{ route('store.coupon') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Coupon</label>
                          <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                          @error('coupon_name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Discount</label>
                          <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                          @error('discount')
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>




                </div>
            </div>
        </div>
    </div>

</div>
@endsection