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

    public function productDetails($id){
        $products = Product::findorFail($id);
        $category_id = $products->category_id;
        $related_product = Product::where('category_id', $category_id)->where('id','!=',$id)->latest()->get();
        return view('product_details', compact('products', 'related_product'));
    }

    //Shop Page

    public function shop(){
        $products = Product::where('status', 1)->latest()->paginate(6);
        $latest_p = Product::where('status', 1)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('status', 1)->latest()->get();
        return view('pages.shop', compact('products','latest_p', 'categories'));
    }

    //Category View

    public function CategoryShow($id){
        $category_product = Product::where('category_id', $id)->latest()->get();
        $latest_p = Product::where('status', 1)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('status', 1)->latest()->get();
        return view('pages.category_view', compact('category_product', 'latest_p', 'categories'));
    }

    public function search(Request $request){
        $search = $request->search;
        
        $products = Product::where('product_name', 'like', '%'.$search.'%')
                             ->orwhere('product_slug', 'like', '%'.$search.'%')
                             ->orwhere('product_code', 'like', '%'.$search.'%')
                             ->orwhere('short_description', 'like', '%'.$search.'%')
                             ->orwhere('long_description', 'like', '%'.$search.'%')
                             ->orwhere('price', 'like', '%'.$search.'%')->get();
        $latest_p = Product::where('status', 1)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('status', 1)->latest()->get();
        return view('pages.search', compact('products','latest_p', 'categories', 'search'));
    }
}
