<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditAttributeProductComponent extends Component
{
    public $name;
    public $attrebute_id;

    public function mount($attrebute_id){
        $pattrbute=ProductAttribute::find($attrebute_id);
        $this->attrebute_id=$pattrbute->id;
        $this->name=$pattrbute->name;
    }
    public function updateAttrbutes(){
        $pattrbute=ProductAttribute::find($this->attrebute_id);
        $pattrbute->name=$this->name;
        $pattrbute->save();
        session()->flash('message','Attrbute has been Edit successfuly');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-product-component')->layout('layouts.base');
    }
}
