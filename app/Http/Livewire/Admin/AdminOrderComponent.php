<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminOrderComponent extends Component
{
     
    public function updateOrderStatus($order_id,$status){

        $orders=Order::find($order_id);

        $orders->status=$status;
        
        if($status == 'delivered'){
            $orders->delivered_date=DB::raw('CURRENT_DATE');
        }
        else if($status == 'canceled')
        {
            $orders->canceled_date=DB::raw('CURRENT_DATE');
        }
        $orders->save();
        Session()->flash('order_message','Order Status has been updated Successuflly');
    }
    public function render()
    {
      
        $orders=Order::orderBy('created_at','DESC')->paginate(12);
         
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
