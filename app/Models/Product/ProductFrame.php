<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFrame extends Model
{
    use HasFactory;
    protected $table = 'product_frame';

    public function linkProductItem(){
        return $this->hasMany(ProductItem::class,'item_frame','frame_uuid');
    }
}
