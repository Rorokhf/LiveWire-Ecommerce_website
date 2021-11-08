<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=> 'required|unique:categories'
        ]);
    }
    public function storCategory(){
        $this->validate([
            'name' => 'required',
            'slug'=> 'required|unique:categories'
        ]);

        if ($this->category_id)
        {
            $subcategory= new Subcategory();
            $subcategory->name=$this->name;
            $subcategory->slug=$this->slug;
            $subcategory->category_id=$this->category_id;
            $subcategory->save();
            session()->flash('message','SubCategory has been created successfuly');
        }
        else
        {
            $category=new category();
            $category->name=$this->name;
            $category->slug=$this->slug;
            $category->save();
            session()->flash('message','Category has been created successfuly');
        }



    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-category-component',
        ['categories'=>$categories])->layout('layouts.base');
    }
}
