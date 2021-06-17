<?php

namespace App\Http\Controllers;
use App\Wishlist;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlistPage(){
        $wishlist =Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('pages.wishlist', compact('wishlist'));
    }

    public function addWishlist(Request $request, $id){
        if(Auth::check()){
            $check = Wishlist::where('product_id', $id)->where('user_id',Auth::id())->first();
        if($check){
                    
                    Session::flash('success','Product ALready Added to Wishlist!');
                    return redirect()->back();
        }else{
        Wishlist::insert([
            'product_id'=>$id,
            'user_id'=> Auth::id(),
        ]);

        Session::flash('success','Product Successfully Added to Wishlist!');
        return redirect()->back();
        }
        }else{
            Session::flash('success','You Have not Login, Frist Login In your Account!');
        return redirect()->route('login');
        }

    }


    public function wishlistDelete($id){
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        Session::flash('success','Product Successfully Remove From WishList!!');
        return redirect()->back();
    }
}
