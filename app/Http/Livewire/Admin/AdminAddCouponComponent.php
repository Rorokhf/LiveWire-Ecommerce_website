<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $Expiry_Date;

    public function updateCoupon($fields){
        $this->validateOnly($fields,[
            'code'=>'required|unique:Coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'Expiry_Date'=>'required'
        ]);
    }
    public function storCoupon(){
        $this->validate([
            'code'=>'required|unique:Coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'Expiry_Date'=>'required'
        ]);
        $coupon=new Coupon();

        $coupon->code=$this->code;
        $coupon->type=$this->type;
        $coupon->value=$this->value;
        $coupon->cart_value=$this->cart_value;
        $coupon->Expiry_Date=$this->Expiry_Date;
        $coupon->save();
        Session()->flash('message','coupon has been saved Successfuly');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');
    }
}
