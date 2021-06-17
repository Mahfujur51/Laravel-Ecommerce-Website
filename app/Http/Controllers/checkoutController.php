<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class checkoutController extends Controller
{
    public function checkout(){
        if(Auth::check()){
            $cart =Cart::where('user_ip', request()->ip())->latest()->get();
        return view('pages.checkout', compact('cart'));
        }else{
            Session::flash('success','You Have not Login, Frist Login In your Account!');
        return redirect()->route('login');
        }
        
    }
}
