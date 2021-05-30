<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

        //==================Store Brand================

        public function StoreBrand(Request $request){
            $request->validate([
                'brand_name'=>'required|unique:brands,brand_name'
            ]);
            Brand::insert([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Brand Added Successfully');
    
    
        }

        //======================Edit Brand Data===========================================
    
    public function Edit($brand_id){
        $brand=Brand::find($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }

    //======================Edit Brand Data===========================================

    public function UpdateBrand(Request $request){
        $brand_id = $request->id;
        Brand::find($brand_id)->update([
            'brand_name'=>$request->brand_name,
            'updated_at'=>Carbon::now()
        ]);

        return Redirect()->route('admin.brand')->with('Catupdated', 'Brand Updated Successfully');
    }

    //======================Delete Brand ===========================================
    
    public function Delete($brand_id){
        $brand=Brand::find($brand_id)->delete();
        return Redirect()->back()->with('delete', 'Brand Deleted Successfully');
    }

    //======================Inactive Brand ===========================================

    public function Inactive($brand_id){
        Brand::find($brand_id)->update(['status'=>0]);
        return Redirect()->back()->with('delete', 'Brand Inactive Successfully');
    }

//======================Active Brand ===========================================

    public function Active($brand_id){
        Brand::find($brand_id)->update(['status'=>1]);
        return Redirect()->back()->with('Catupdated', 'Brand Active Successfully');
    }

}
