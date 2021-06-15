<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlistPage(){
        return view('pages.wishlist');
    }
}
