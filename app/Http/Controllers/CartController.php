<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request, $id){
        $check = Cart::where('product_id', $id)->where('user_ip',request()->ip())->first();
        if($check){
                    Cart::where('product_id', $id)->where('user_ip',request()->ip())->increment('qty');
                    Session::flash('success','Product Successfully Added to Cart!');
                    return redirect()->back();
        }else{
        Cart::insert([
            'product_id'=>$id,
            'qty'=>1,
            'price'=>$request->price,
            'user_ip'=> request()->ip(),
        ]);

        Session::flash('success','Product Successfully Added to Cart!');
        return redirect()->back();
        }
    }

    public function cartPage(){
        $cart =Cart::where('user_ip', request()->ip())->latest()->get();
        return view('pages.cart-page', compact('cart'));
    }

    public function cartDelete($id){
        Cart::where('id', $id)->where('user_ip', request()->ip())->delete();
        Session::flash('success','Product Successfully Remove From Cart!!');
        return redirect()->back();
    }

    public function qtyUpdate(Request $request, $id){
        Cart::where('id', $id)->where('user_ip', request()->ip())->update([
            'qty'=>$request->qty,
        ]);

        Session::flash('success','Product Quantity Successfully Updated!');
        return redirect()->back();
    }

    public function cuponApply(Request $request){
        //dd($request->all());

        $check = Coupon::where('coupon_name', $request->cupon_name)->first();

        if($check){
            Session::put('coupon',[
                'coupon_name'=>$check->coupon_name,
                'coupon_discount'=>$check->discount,
            ]);
            Session::flash('success','Coupon Successfully Added!');
        return redirect()->back();
        }else{
            Session::flush();
            Session::flash('success','Opps Sorry!| Invalid Coupon Code!');
        return redirect()->back();
        }
    }



}
