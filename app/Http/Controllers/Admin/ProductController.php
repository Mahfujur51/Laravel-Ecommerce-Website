<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use Carbon\Carbon;
use App\Product;
use App\Cart;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Add Product use product index page

    public function addProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return view('admin.product.add',compact('brands', 'categories'));
    }

    //==================add Product================

        public function StoreProduct(Request $request){
            $request->validate([
                'product_name'=>'required|max:255',
                'product_code'=>'required|max:255',
                'price'=>'required|max:255',
                'product_quantity'=>'required|max:255',
                'category_id'=>'required|max:255',
                'brand_id'=>'required|max:255',
                'short_description'=>'required',
                'long_description'=>'required',
                'image_one'=>'required|mimes:jpg,jpeg,png,gif|max:255',
                'image_two'=>'required|mimes:jpg,jpeg,png,gif|max:255',
                'image_three'=>'required|mimes:jpg,jpeg,png,gif|max:255',
                
            ],[
                'category_id.required'=>'Select Category Name',
                'brand_id.required'=>'Select Brand Name',
            ]);

            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;

            $imag_three = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
            Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;

            Product::insert([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
                'product_code' => $request->product_code,
                'price' => $request->price,
                'product_quantity' => $request->product_quantity,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image_one' => $img_url1,
                'image_two' => $img_url2,
                'image_three' => $img_url3,
                'created_at' => Carbon::now(),
            ]);

            //return Redirect()->back()->with('success','Product Added Successfully.');

            Session::flash('success','Product Added Successfully!');
            return redirect()->route('manage-products');
            
    
    
        }

        public function manageProduct(){
            $products = Product::latest()->get();
            return view('admin.product.manage_product', compact('products'));
        }

        public function editProduct($product_id){
            $products = Product::find($product_id);
            $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
            return view('admin.product.edit',compact('products','brands','categories'));
        }


        public function updateProduct(Request $request){
            $product_id = $request->id;
            $request->validate([
                'product_name'=>'required|max:255',
                'product_code'=>'required|max:255',
                'price'=>'required|max:255',
                'product_quantity'=>'required|max:255',
                'category_id'=>'required|max:255',
                'brand_id'=>'required|max:255',
                'short_description'=>'required',
                'long_description'=>'required',
                
            ],[
                'category_id.required'=>'Select Category Name',
                'brand_id.required'=>'Select Brand Name',
            ]);
            
            Product::findOrFail($product_id)->update([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
                'product_code' => $request->product_code,
                'price' => $request->price,
                'product_quantity' => $request->product_quantity,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]); 
            $cart=Cart::where('product_id',$request->id)->get();
            foreach($cart as $carts){
                $cart_id = $carts->id;
            Cart::find($cart_id)->update([
            'price'=>$request->price,
            ]);
            }

            //return Redirect()->route('manage-products')->with('success','Product Data Updated Successfully.');
            Session::flash('success','Product Data Updated Successfully!');
            return redirect()->route('manage-products');

        }

        public function updatePImage(Request $request){
            $product_id = $request->id;
            $old_one = $request->img_one;
            $old_twoo = $request->img_two;
            $old_three = $request->img_three;

            if($request->has('image_one') && $request->has('image_two')){
            unlink($old_one);
            unlink($old_twoo);
            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);
            
            
             $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('manage-products')->with('success','Product Image Updated Successfully.');
            }

            if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
            unlink($old_one);
            unlink($old_twoo);
            unlink($old_three);

            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);
            

             $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
            ]);

            $imag_three = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
            Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_three' => $img_url3,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage-products')->with('success','Product Image Updated Successfully.');
            }

            if($request->has('image_one')){
            unlink($old_one);
            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            //return Redirect()->route('manage-products')->with('success','Product Image Updated Successfully.');

            Session::flash('success','Product Image Updated Successfully!');
            return redirect()->route('manage-products');

            }

            if($request->has('image_two')){
            unlink($old_twoo);
             $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
            ]);

            //return Redirect()->route('manage-products')->with('success','Product Image Updated Successfully.');

            Session::flash('success','Product Image Updated Successfully!');
            return redirect()->route('manage-products');

            }
            if($request->has('image_three')){
            unlink($old_three);
            $imag_three = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
            Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;
            Product::findOrFail($product_id)->update([
                'image_three' => $img_url3,
                'updated_at' => Carbon::now(),
            ]);

            //return Redirect()->route('manage-products')->with('success','Product Image Updated Successfully.');

            Session::flash('success','Product Image Updated Successfully!');
            return redirect()->route('manage-products');

            }
        }

        public function Delete($product_id){
        $image=Product::findOrFail($product_id);
        $image_one = $image->image_one;
        $image_two = $image->image_two;
        $image_three = $image->image_three;
        unlink($image_one);
        unlink($image_two);
        unlink($image_three);

        Product::findOrFail($product_id)->delete();
        Cart::where('product_id', $product_id)->delete();

        //return Redirect()->back()->with('delete', 'Brand Deleted Successfully');

        Session::flash('success','Product Deleted Successfully!');
            return Redirect()->back();
    }

    //======================Inactive Product ===========================================

    public function Inactive($product_id){
        Product::find($product_id)->update(['status'=>0]);

        //return Redirect()->back()->with('delete', 'Product Inactive Successfully');

        Session::flash('success','Product Inactive Successfully!');
            return Redirect()->back();
    }

//======================Active Product ===========================================

    public function Active($product_id){
        Product::find($product_id)->update(['status'=>1]);

        //return Redirect()->back()->with('delete', 'Product Active Successfully');

        Session::flash('success','Product Active Successfully!');
            return Redirect()->back();
    }
}
