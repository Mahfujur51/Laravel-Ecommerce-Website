<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use Image;
use App\Hero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $hero= Hero::latest()->get();
        return view('hero.index', compact('hero'));
    }
        public  function  store(Request $request){
        $request->validate([
            'image_one' => 'required',
            ]);

        $img_url2 = null;
        if($request->has('image_one')){
            $image_one=$request->file('image_one');
            $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(570,220)->save('frontend/img/banner/'.$name_gen);
            $img_url2='frontend/img/banner/'.$name_gen;
        }

        $hero = new Hero();
        $hero->image_one=$img_url2;
        $hero->save();

        Session::flash('success','Hero Added Successfully');
        return redirect()->back();



    }

    public function delete($id){

        $hero=Hero::findOrFail($id);
        $image_one=$hero->image_one;
        unlink($image_one);
        Hero::findOrFail($id)->delete();
        Session::flash('success','Hero Deleted Successfully!');
        return redirect()->back();
    }

    public function Edit($id){
        $hero=Hero::findOrFail($id);
        return view('hero.hero-edit', compact('hero'));
    }

    public function Update(Request $request, $id){
        $hero=Hero::findOrFail($id);
        $image_one=$hero->image_one;

        if ($request->has('image_one')){
            if(file_exists(public_path($image_one))){
                unlink($image_one);
            }
            $image_one=$request->file('image_one');
            $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(570,220)->save('frontend/img/banner/'.$name_gen);
            $img_url='frontend/img/banner/'.$name_gen;


        }

        
        if ($request->has('image_one')){
            $hero->image_one=$img_url;
        }
        
        $hero->update();
        
        
        Session::flash('success','Hero updated successfully!!');
        return redirect()->route('hero.add');
    }
    
}
