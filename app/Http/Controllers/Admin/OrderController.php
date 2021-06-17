<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }
}
