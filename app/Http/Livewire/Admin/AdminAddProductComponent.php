<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttrbuteValue;
use Carbon\Carbon;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use \Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $subcategory_id;

    public $product_Attrbute;
    public $inputs=[];
    public $attrbute_arr=[];
    public $attrbute_value;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function add(){
        if(!in_array($this->product_Attrbute,$this->attrbute_arr))
        {
            array_push($this->inputs,$this->product_Attrbute);
            array_push($this->attrbute_arr,$this->product_Attrbute);
        }
    }
    public function remove($product_Attrbute)
    {
        unset($this->inputs[$product_Attrbute]);
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' =>  'required |unique:products',
            'regular_price' => 'required',
            'sale_price' => 'nullable |numeric',
            'stock_status' =>  'required',
            'quantity' =>  'required|numeric',
            // ' category_id' =>  'required'
        ]);
    }
    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' =>  'required |unique:products',
            'regular_price' => 'required',
            'sale_price' => 'nullable |numeric',
            'stock_status' =>  'required',
            'quantity' =>  'required|numeric',
            // ' category_id' =>  'required'
        ]);
        $product = new product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->subcategory_id=$this->subcategory_id;

        $ingName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $ingName);
        $product->image = $ingName;
        //image gallery
        if ($this->images) {
            $imagesName = '';
            foreach ($this->images as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        }
        $product->category_id = $this->category_id;

        if($this->subcategory_id)
        {
            $product->subcategory_id=$this->subcategory_id;
        }
        $product->save();
        foreach($this->attrbute_value as $key =>$attrbuteValue)
        {
            $avalues=explode(",",$attrbuteValue);
            foreach($avalues as $avalue)
            {
                $attr_value= new AttrbuteValue();
                $attr_value->product_attrbute_id =$key;
                $attr_value->value=$avalue;
                $attr_value->product_id=$product->id;
                $attr_value->save();
            }
        }
        Session()->flash('message', 'products has been created Successfuly');
    }
    public function changeSubcategory(){
        $this->subcategory_id=0;
    }
    public function render()
    {
        $categories = category::all();
        $subcategories=Subcategory::where('category_id',$this->category_id)->get();
        $productAttrbute=ProductAttribute::all();

        return view('livewire.admin.admin-add-product-component',
         ['categories' => $categories,
         'subcategories'=>$subcategories,
         'productAttrbute'=>$productAttrbute
         ])->layout('layouts.base');
    }
}
