<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }

        //==================Store Coupon================

        public function StoreBrand(Request $request){
            $request->validate([
                'coupon_name'=>'required|unique:coupons,coupon_name'
            ]);
            Coupon::insert([
                'coupon_name'=>$request->coupon_name,
                'created_at'=>Carbon::now()
            ]);
    
            //return Redirect()->back()->with('success', 'Coupon Added Successfully');
            Session::flash('success','Coupon Added Successfully!');
        return redirect()->back();
    
    
        }

        //======================Edit Coupon Data===========================================
    
    public function Edit($coupon_id){
        $coupon=Coupon::find($coupon_id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    //======================Update Coupon Data===========================================

    public function UpdateCoupon(Request $request){
        $coupon_id = $request->id;
        Coupon::find($coupon_id)->update([
            'coupon_name'=>$request->coupon_name,
            'updated_at'=>Carbon::now()
        ]);

        //return Redirect()->route('admin.coupon')->with('Catupdated', 'Coupon Updated Successfully');
        Session::flash('success','Coupon Updated Successfully');
        return redirect()->route('admin.coupon');
    }

    //======================Delete Coupon ===========================================
    
    public function Delete($coupon_id){
        $coupon=Coupon::find($coupon_id)->delete();
        //return Redirect()->back()->with('delete', 'Coupon Deleted Successfully');
        Session::flash('success','Coupon Deleted Successfully');
        return redirect()->back();
    }

    //======================Inactive Coupon ===========================================

    public function Inactive($coupon_id){
        Coupon::find($coupon_id)->update(['status'=>0]);
        //return Redirect()->back()->with('delete', 'Coupon Inactive Successfully');
        Session::flash('success','Coupon Inactive Successfully');
        return redirect()->back();
    }

//======================Active Coupon ===========================================

    public function Active($coupon_id){
        Coupon::find($coupon_id)->update(['status'=>1]);
        //return Redirect()->back()->with('Catupdated', 'Coupon Active Successfully');
        Session::flash('success','Coupon Active Successfully');
        return redirect()->back();
    }
}
