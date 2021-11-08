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
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
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
    public $newImg;
    public $product_id;

    public $subcategory_id;

    public $images;
    public $newImages;

    public $product_Attrbute;
    public $inputs=[];
    public $attrbute_arr=[];
    public $attrbute_value=[];


    public function mount($product_slug)
    {
        $product = product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
        //name  in model product
        $this->inputs=$product->attrbuteValue->where('product_id',$product->id)->unique('product_attrbute_id')->pluck('product_attrbute_id');
        $this->attrbute_arr=$product->attrbuteValue->where('product_id',$product->id)->unique('product_attrbute_id')->pluck('product_attrbute_id');
        foreach($this->attrbute_arr as $a_arr)
        {
            $attrbuteValue=AttrbuteValue::where('product_id',$product->id)->where('product_attrbute_id',$a_arr)->get()->pluck('value');
            $valueString='';
            foreach($attrbuteValue as $value)
            {

                $valueString=$valueString . $value . ',';
            }
            $this->attrbute_value[$a_arr]=rtrim($valueString,",");
        }
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    // add attrbute
    public function add()
    {
        if(!$this->attrbute_arr->contains($this->product_Attrbute))
        {
            $this->inputs->push($this->product_Attrbute);
            $this->attrbute_arr->push($this->product_Attrbute);
        }
    }
    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' =>  'required',
            'regular_price' => 'required',
            'sale_price' => 'nullable |numeric',
            'stock_status' =>  'required',
            'quantity' =>  'required|numeric',
            // 'category_id' =>  'required'
        ]);
    }
    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' =>  'required ',
            'regular_price' => 'required',
            'sale_price' => 'numeric',
            'stock_status' =>  'required',
            'quantity' =>  'required|numeric',
            // 'category_id' => 'required'
        ]);
        $product = product::find($this->product_id);
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
        if ($this->newImg) {
            unlink('assets/images/products' . '/' . $product->image);
            $ingName = Carbon::now()->timestamp . '.' . $this->newImg->extension();
            $this->newImg->storeAs('products', $ingName);
            $product->image = $ingName;
        }

        if ($product->images) {
            $images = explode(",", $product->images);
            foreach ($images as $image) {
                if ($image) {
                    unlink('assets/images/products' . '/' . $image);
                }
            }
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
        AttrbuteValue::where('product_id',$product->id)->delete();
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
        Session()->flash('message', 'products has been updating Successfuly');
    }
    public function changeSubcategory(){
        $this->subcategory_id=0;
    }
    public function render()
    {
        $categories = category::all();
        $subcategory=Subcategory::where('category_id',$this->category_id)->get();
        $productAttrbute=ProductAttribute::all();
        return view('livewire.admin.admin-edit-product-component',
         ['categories' => $categories,
         'subcategory' => $subcategory,
         'productAttrbute' => $productAttrbute
         ])->layout('layouts.base');
    }
}
