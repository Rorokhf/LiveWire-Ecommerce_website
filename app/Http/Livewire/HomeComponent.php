<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\HomeSlider;
use App\Models\HomeCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders=HomeSlider::where('status',1)->get();
        $L_products=product::orderBy('created_at','DESC')->get()->take(8);
        $category=HomeCategory::find(1);
        $cats=explode(',', $category->sel_categories);
        $categories=category::whereIn('id',$cats)->get();
        $no_of_product=$category->no_of_product;
        $sproducts=product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale=Sale::find(1);

        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.home-component',
        ['sliders'=>$sliders,'L_products'=>$L_products,
        'categories'=>$categories,'no_of_product'=>$no_of_product,'sproducts'=>$sproducts,'sale'=>$sale])->layout('layouts.base');
    }
}
