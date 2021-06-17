@extends('admin.admin_master')
@section('orders') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Orders</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
              <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Order List</h6>
              </div>
                 
                <br>   
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-5p">Sl</th>
                        <th class="wd-15p">Invoice No</th>
                        <th class="wd-15p">Payment Type</th>  
                        <th class="wd-15p">Subtotal</th>  
                        <th class="wd-15p">Discount</th>  
                        <th class="wd-15p">Total</th>  
                        <th class="wd-20p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($orders as $order)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>#{{$order->invoice_no}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->subtotal}}</td>
                        <td>
                            @if($order->coupon_discount == NULL)
                            No Coupon
                            @else
                            {{$order->coupon_discount}}%
                            @endif
                        </td>
                        <td>{{$order->total}}</td>
                        
                        <td>
                            <a href="{{ url('admin/order/view/'.$order->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Edit</a>
                            <a href="{{ url('admin/order/vdeleteiew/'.$order->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

        
    </div>

</div>
@endsection