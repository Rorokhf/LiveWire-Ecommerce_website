<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $subcategory_id;
    public $subcategory_slug;

    public function mount($category_slug, $subcategory_slug = null)
    {
        if ($this->subcategory_slug) {
            $this->subcategory_slug = $subcategory_slug;
            $subcategory = Subcategory::where('slug', $subcategory_slug)->first();
            $this->subcategory_id = $subcategory->id;
            $this->name = $subcategory->name;
            $this->slug = $subcategory->slug;
        } else {
            $this->category_slug = $category_slug;
            $category = category::where('slug', $category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:catecories'
        ]);
    }
    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:catecories'
        ]);

        if ($this->subcategory_id) {
            $subcategory = Subcategory::find($this->subcategory_id);
            $subcategory->name = $this->name;
            $subcategory->slug = $this->slug;
            $subcategory->category_id=$this->category_id;
            $subcategory->save();
            Session()->flash('message', 'SubCategory has been Updating Successfuly');
        } else {
            $category = category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            Session()->flash('message', 'Category has been Updating Successfuly');
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
