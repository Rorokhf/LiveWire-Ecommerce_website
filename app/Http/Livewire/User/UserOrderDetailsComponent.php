<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailsComponent extends Component
{
    protected $order_id;
    public function mount($order_id){
        $this->order_id=$order_id;
    }

    public function cancelOrder(){

        $orders=Order::find($this->order_id);
        $orders->status= "canceled" ;
        $orders->canceled_date=DB::raw('CURRENT_DATE');
        $orders->save();
        Session()->flash('order_message','Order Status has been canceled!');
    }

    public function render()
    {
        $orders=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        
        return view('livewire.user.user-order-details-component',['orders'=>$orders])->layout('layouts.base');
    }
}
