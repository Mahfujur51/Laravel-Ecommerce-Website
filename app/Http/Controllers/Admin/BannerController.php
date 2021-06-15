<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Banner;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.banner.add');
    }

    public  function  store(Request $request){
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'small_description' => 'required',
            'small_description2' => 'required',
            'big_description' => 'required',
            ]);

        $img_url2 = null;
        if($request->has('image')){
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570,220)->save('frontend/img/banner/'.$name_gen);
            $img_url2='frontend/img/banner/'.$name_gen;
        }

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->small_description = $request->small_description;
        $banner->small_description2 = $request->small_description2;
        $banner->big_description = $request->big_description;
        $banner->image=$img_url2;
        $banner->save();

        Session::flash('success','Banner Added Successfully');
        return redirect()->back();



    }

    public function all(){
        $banner= Banner::latest()->get();
        return view('admin.banner.all-banner', compact('banner'));
    }

    public function delete($id){

        $banner=Banner::findOrFail($id);
        $image=$banner->image;
        unlink($image);
        Banner::findOrFail($id)->delete();
        Session::flash('success','Banner Deleted Successfully!');
        return redirect()->back();
    }

    public function Edit($id){
       $banner= Banner::findOrFail($id); 
       return view('admin.banner.banner-edit', compact('banner'));
    }

    public function update(Request $request,$id){
        $banner=Banner::findOrFail($id);
        $image=$banner->image;

        if ($request->has('image')){
            if(file_exists(public_path($image))){
                unlink($image);
            }
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570,220)->save('frontend/img/banner/'.$name_gen);
            $img_url='frontend/img/banner/'.$name_gen;


        }

        $banner['title']  = $request -> title;
        $banner['small_description'] = $request->small_description;
        $banner['small_description2'] = $request->small_description2;
        $banner['big_description'] = $request->big_description;
        if ($request->has('image')){
            $banner->image=$img_url;
        }
        
        $banner->update();
        
        
        Session::flash('success','Banner updated successfully!!');
        return redirect()->route('manage.banner');
    }
}
