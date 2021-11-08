<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="products";

    public function categories(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class,'product_id');
    }
    public function subcategories(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function attrbuteValue(){
        return $this->hasMany(AttrbuteValue::class,'product_id');
    }
}
