<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributeProductComponent extends Component
{
    public function deleteAttrbute($attrebute_id)
    {
        $pattrbute=ProductAttribute::find($attrebute_id);

        $pattrbute->delete();
        session()->flash('message','Attrbute has been deleted successfuly');
    }
    public function render()
    {
        $pattrbute=ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attribute-product-component',[
            'pattrbute'=>$pattrbute
        ])->layout('layouts.base');
    }
}
