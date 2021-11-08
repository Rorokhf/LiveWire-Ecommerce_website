<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\Subcategory;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $subcategory_slug;

    public function mount($category_slug, $subcategory_slug = null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->subcategory_slug = $subcategory_slug;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        $category_id = null;
        $category_name = "";
        $filter = "";

        if ($this->subcategory_slug) {
            $subcategory = Subcategory::where('slug', $this->subcategory_slug)->first();
            $category_id = $subcategory->id;
            $category_name = $subcategory->name;
            $filter = "sub";
        }
        else {
            $category = category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter="";
        }

        if ($this->sorting == 'date') {
            $products = product::where($filter.'category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price') {
            $products = product::where($filter.'category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $products = product::where($filter.'category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = product::paginate($this->pagesize);
        }

        $categories = category::all();

        return view(
            'livewire.category-component',
            [
                'products' => $products,
                'categories' => $categories,
                'category_name' => $category_name
            ]
        )->layout('layouts.base');
    }
}
