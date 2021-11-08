<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Review;

class UserReviewComponent extends Component
{ 
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id){
        $this->order_item_id=$order_item_id;
    }
public function update($fields){
    $this->validateOnly($fields,[
        'rating' => 'required'
    ]);
}
    public function addReview(){
        $this->validate([
            'rating' => 'required'
        ]);
        $review=new Review();
        $review->rating=$this->rating;
        $review->comment=$this->comment;
       $review->order_item_id=$this->order_item_id;
        $review->save();
        $orderItem=OrderItem::find($this->order_item_id);
        $orderItem->restatus=true;
        $orderItem->save();
        Session()->flash('message','Your review has been added Successfuly');
    }
    public function render()
    {
        $orderItem=OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component',['orderItem'=>$orderItem])->layout('layouts.base');
    }
}
