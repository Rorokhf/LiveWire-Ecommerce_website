<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item added in cart');
    }
    public function removeFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $w_item) {
            if ($w_item->id == $product_id) {
                Cart::instance('wishlist')->remove($w_item->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }
    public function moveProductFromWishlist($rowId){
       $item= Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
