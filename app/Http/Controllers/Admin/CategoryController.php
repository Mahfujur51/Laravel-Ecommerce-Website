<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    //==================Store Category================

    public function StoreCat(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name'
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Category Added Successfully');


    }

//======================Edit Category Data===========================================
    
    public function Edit($cat_id){
            $category=Category::find($cat_id);
            return view('admin.category.edit', compact('category'));
        }

//======================Edit Category Data===========================================

        public function UpdateCat(Request $request){
            $cat_id = $request->id;
            Category::find($cat_id)->update([
                'category_name'=>$request->category_name,
                'updated_at'=>Carbon::now()
            ]);
    
            return Redirect()->route('admin.category')->with('Catupdated', 'Category Updated Successfully');
        }
//======================Delete Category ===========================================
    
        public function Delete($cat_id){
            $category=Category::find($cat_id)->delete();
            return Redirect()->back()->with('delete', 'Category Deleted Successfully');
        }
//======================Inactive Category ===========================================

        public function Inactive($cat_id){
            Category::find($cat_id)->update(['status'=>0]);
            return Redirect()->back()->with('delete', 'Category Inactive Successfully');
        }

//======================Active Category ===========================================

        public function Active($cat_id){
            Category::find($cat_id)->update(['status'=>1]);
            return Redirect()->back()->with('Catupdated', 'Category Active Successfully');
        }





}
