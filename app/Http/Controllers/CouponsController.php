<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{

    public function addCoupon(Request $request){
		if($request->isMethod('post')){
            $data = $request->all();
			/*echo "<pre>"; print_r($data); die;*/
			$coupon = new Coupon;
			$coupon->coupon_code = $data['coupon_code'];	
			$coupon->type = $data['type'];	
			$coupon->amount = $data['amount'];
			$coupon->expiry_date = $data['expiry_date'];
			$coupon->status = $data['status'];
			$coupon->save();	
			return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success', 'Coupon has been added successfully');
		}
		return view('coupons.add_coupon');
    }

    public function editCoupon(Request $request , $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            $coupon = Coupon::find($id);
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->type = $data['type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success','Coupon updated successfully!');
        }
        $couponDetails = Coupon::find($id);
        return view('coupons.edit_coupon')->with(compact('couponDetails'));
    }


    public function viewCoupons(){
        $coupons = Coupon:: orderBy('id','DESC')->get();
        return view('coupons.view_coupon')->with(compact('coupons'));
    }

    public function deleteCoupon($id = null){
        Coupon::where([ 'id' => $id ])->delete();
        return redirect()->back()->with('flash_message_success','Coupon deleted successfully!');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*   $coupon = Coupon::where('code',$request->coupon_code);
        if(!$coupon){
            return redirect()->route('checkout.index')->withErrors('Coupon not found.Please try again.');
        }
        session()->put('coupon',[
            'name' => $coupon->code,
            'discount' => $coupon->discount() ,
        ]);
        return redirect()->route('checkout.index')->with('success_message','Coupon added successfully!'); */
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {/*
        session()->forget('coupon');
        return redirect()->route('checkout.index')->with('success_message','Coupon deleted successfully!');
    */}
}
