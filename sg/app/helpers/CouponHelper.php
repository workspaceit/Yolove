<?php

class CouponHelper {

    public function getAllCoupons(){
        $coupon = Coupons::all();
        return $coupon;
    }
    public function getCouponByCode($code){
        $coupon = Coupons::where('code','=',$code)->get();
        return $coupon;
    }
    public function getCouponById($id){
        $coupon = Coupons::find($id);
        return $coupon;
    }
    public function createCoupon($input){
        $coupon = new Coupons();
        
    }
    public function updateCoupon($id,$input){
        $coupon = Coupons::find($id);
    }
    public function deleteCoupon($id){
        $coupon = Coupons::find($id);
        $coupon->delete();
        return $coupon;
    }
    

}

?>
