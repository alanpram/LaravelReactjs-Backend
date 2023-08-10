<?php

namespace App\Models\Product;

use App\Models\Plugin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';

    public function linkImage(){
        return $this->hasOne(Media::class, 'media_model_id','category_uuid')->where('media_model', 'Product/Category')->where('media_status',true);
    }
}
