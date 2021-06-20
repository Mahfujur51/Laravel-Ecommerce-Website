@extends('admin.admin_master')
@section('orders') active  @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">View Orders</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row">
        <div class="card">
            <div class="card-header bg-primary text-white" >
                <h2 class="card-body-title text-white pl-2" style="font-size:15px;">Shipping Details</h2>
              </div>
          <div class="form-layout pd-10">
          
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$shipping->shipping_first_name}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  value="{{$shipping->shipping_last_name}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{$shipping->shipping_phone}}" readonly>
                 
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$shipping->shipping_email}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$shipping->shipping_state}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$shipping->shipping_address}}" readonly>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{$shipping->post_code}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
        </div>

        
    </div>

    <div class="sl-pagebody">
      <div class="row">
        <div class="card">
            <div class="card-header bg-success text-white" >
                <h2 class="card-body-title text-white pl-2" style="font-size:15px;">View Orders</h2>
              </div>
          <div class="form-layout pd-10">
          
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$order->invoice_no}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  value="{{$order->payment_type}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{$order->total}}" readonly>
                 
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Subtotal: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$order->subtotal}}" readonly>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="@if($order->coupon_discount == NULL)No Coupon Apply
                  @else{{$order->coupon_discount}}%@endif" readonly>
                  
                </div>
              </div><!-- col-4 -->
              

              
        </div>

        <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
              <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Order Items</h6>
              </div>
                 
                <br>   
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-5p">Sl</th>
                        <th class="wd-15p">Product Name</th>
                        <th class="wd-15p">Image</th>  
                        <th class="wd-15p">Quantity</th>  
                        <th class="wd-15p">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($orderitems as $orders)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$orders->product->product_name}}</td>
                        <td><img src="{{ asset($orders->product->image_one) }}" width="50px" height="50px" alt=""></td>
                        <td>{{$orders->product_qty}}</td>
                        <td>{{$orders->product->price}}</td>
                        
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
@endsection