<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Hero;
use App\Banner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $products = Product::where('status', 1)->latest()->get();
        $hero = Hero::latest()->get();
        $latest_p = Product::where('status', 1)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('status', 1)->latest()->get();
        $banner = Banner::latest()->get();
        return view('pages.index', compact('products', 'categories', 'banner','latest_p', 'hero'));
    }
}
