<?php

namespace App\Http\Livewire\Admin;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $search;

    public function deleteProduct($id)
    {
        $product=product::find($id);
        if($product->image){
            unlink('assets/images/products'.'/'.$product->image);
        }
        if($product->images)
        {
            $images=explode(",",$product->images);
            foreach($images as $image)
            {
                if($image)
                {
                   unlink('assets/images/products'.'/'.$image);
                }

            }
        }
        $product->delete();
        Session()->flash('message','product has been deleted Successfuly');
    }
    public function render()
    {
        $search='%'. $this->search . '%';
        $products=product::where('name','LIKE',$search)
        ->orWhere('stock_status','LIKE',$search)
        ->orWhere('regular_price','LIKE',$search)
        ->orWhere('sale_price','LIKE',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',
        ['products'=>$products])->layout('layouts.base');
    }
}
