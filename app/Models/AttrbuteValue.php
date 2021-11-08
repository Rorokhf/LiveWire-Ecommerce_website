<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrbuteValue extends Model
{
    use HasFactory;
    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class,'product_attrbute_id');
    }
}
