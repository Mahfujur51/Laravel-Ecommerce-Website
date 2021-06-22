

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
                <h6 class="card-body-title text-white">Order Details</h6>
              </div>    
               
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Invoice No</th>  
                        <th class="wd-10p">Payment Type</th>  
                        <th class="wd-10p">Sub Total</th>  
                        <th class="wd-10p">Discount</th>  
                        <th class="wd-10p">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr>
                        <td>#{{$order->invoice_no}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->subtotal}}</td>
                        <td>{{$order->subtotal - $order->total}}</td>
                        <td>{{$order->total}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>


    </div>
  </div>

 
    

</div>

<div class="col-sm-12 mt-5">
    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Shipping Details</h6>
              </div>    
               
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Name</th>  
                        <th class="wd-10p">Email</th>  
                        <th class="wd-10p">Phone</th>  
                        <th class="wd-10p">Address</th>
                        <th class="wd-10p">State</th>
                        <th class="wd-10p">Post Code</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr>
                        <td>{{$shipping->shipping_first_name}} {{$shipping->shipping_last_name}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_state}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->post_code}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>


    </div>
    <div class="col-sm-12 mt-5">
    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Products Details</h6>
              </div>    
               
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                      <td>SL</td>
                        <td class="wd-15p">Name</td>
                        <th class="wd-15p">Image</th>  
                        <th class="wd-15p">Product Code</th>  
                        <th class="wd-10p">Quantity</th>  
                        <th class="wd-10p">Price</th>
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
                        <td>{{$orders->product->product_code}}</td>
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

