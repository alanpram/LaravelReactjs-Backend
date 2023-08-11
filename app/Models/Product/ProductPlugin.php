<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlugin extends Model
{
    use HasFactory;
    protected $table = 'plugin_product';

    protected $primaryKey = 'product_id';
    protected $hidden = ['product_id'];

    public function linkFrame(){
        return $this->hasOne(ProductFrame::class,'frame_uuid','product_model_id');
    }
}
