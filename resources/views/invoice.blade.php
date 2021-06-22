<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <h3 class="text-center">Invoice #{{$order->invoice_no}}</h3>
  <br>
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
                  <hr>
    <table class="table">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>