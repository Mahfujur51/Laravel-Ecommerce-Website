<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderItem;
use App\Shipping;
use App\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        //dd($request->all());

        $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
            'shipping_state' => 'required',
            'post_code' => 'required',
            'payment_type' => 'required',
            ]);


            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'invoice_no' => mt_rand(10000000,99999999),
                'payment_type' => $request->payment_type,
                'subtotal' => $request->subtotal,
                'total' => $request->total,
                'coupon_discount' => $request->coupon_discount,
                'payment_type' => $request->payment_type,
                'created_at' => Carbon::now(),

            ]);

            $carts =Cart::where('user_ip', request()->ip())->latest()->get();

            foreach($carts  as $cart){
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->product_id,
                    'product_qty' => $cart->qty,
                    'created_at' => Carbon::now(),
                ]);
            }

            Shipping::insert([
                'order_id' => $order_id,
                'shipping_first_name' => $request->shipping_first_name,
                'shipping_last_name' => $request->shipping_last_name,
                'shipping_email' => $request->shipping_email,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'shipping_state' => $request->shipping_state,
                'post_code' => $request->post_code,
                'created_at' => Carbon::now(),
            ]);

            if(Session::has('coupon')){
                session()->forget('coupon');
            }

            Cart::where('user_ip', request()->ip())->delete();

            Session::flash('success','Your Order Has been Successfull!!');
            return redirect()->route('order.success');



    }

    public function orderSuccess(){
        return view('pages.order_colmplete');
    }
}
