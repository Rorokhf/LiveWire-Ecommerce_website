<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use App\Models\Subcategory;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id)
    {
        $category=category::find($id);
        $category->delete();
        Session()->flash('message','category has been deleted Successfuly');
    }
    public function deleteSubcategory($id)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->delete();
        Session()->flash('message','Subcategory has been deleted Successfuly');
    }
    public function render()
    {
        $categories=category::paginate(5);

        return view('livewire.admin.admin-category-component',
        ['categories'=>$categories])->layout('layouts.base');
    }
}
