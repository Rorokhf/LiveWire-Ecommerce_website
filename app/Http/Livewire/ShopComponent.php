<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }
    public function store($product_id, $product_name, $product_price)
    {
      Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\product');

        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }
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
    use WithPagination;
    public function render()
    {

        if ($this->sorting == 'date') {
            $products = product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price') {
            $products = product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $products = product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = product::whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }

        $categories = category::all();

        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.shop-component',
         ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
