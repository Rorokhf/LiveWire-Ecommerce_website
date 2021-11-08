<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributeProductComponent extends Component
{
    public $name;

    public function storAttrbute(){
        $pattrbute=new ProductAttribute();
        $pattrbute->name=$this->name;
        $pattrbute->save();
        session()->flash('message','Attrbute has been created successfuly');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attribute-product-component')->layout('layouts.base');
    }
}
