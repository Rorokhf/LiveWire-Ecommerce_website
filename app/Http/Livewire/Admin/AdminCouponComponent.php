<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponComponent extends Component
{
    public function deletCoupon($coupon_id){
        $coupon=Coupon::find($coupon_id);
        $coupon->delete();
        Session()->flash('message','coupon has been deleted Successfuly');

    }
    public function render()
    {
        $coupons=Coupon::all();
        return view('livewire.admin.admin-coupon-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
