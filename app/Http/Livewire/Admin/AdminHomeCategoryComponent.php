<?php

namespace App\Http\Livewire\Admin;

use App\Models\category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories=[];
    public $numberofproducts;

    public function mount(){
        $category=HomeCategory::find(1);
        $this->selected_categories=explode(',',$category->sel_categories);
        $this->numberofproducts=$category->no_of_product;
    }
    public function updateHomeCategory(){
        $category=HomeCategory::find(1);
        $category->sel_categories=implode(',',$this->selected_categories);
        $category->no_of_product=$this->numberofproducts;
        $category->save();
        session()->flash('message','Home categories has been updated successfuly');

    }
    public function render()
    {
        
        $categories=category::all();
        return view('livewire.admin.admin-home-category-component'
        ,['categories'=>$categories])->layout('layouts.base');
    }
}
