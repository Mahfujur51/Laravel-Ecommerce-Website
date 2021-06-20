<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function MyOrder(){
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('pages.profile.order', compact('orders'));
    }

    public function viewOrder($id){
        $order = Order::findorFail($id);
        $orderitems = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        return view('pages.profile.view_order', compact('order', 'orderitems', 'shipping'));
    }
}
