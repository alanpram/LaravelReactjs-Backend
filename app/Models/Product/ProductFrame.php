<?php

namespace App\Models\Product;

use App\Models\Plugin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFrame extends Model
{
    use HasFactory;
    protected $table = 'product_frame';

    protected $primaryKey = 'frame_id';
    protected $hidden = ['frame_id'];

    public function linkProductItem(){
        return $this->hasMany(ProductItem::class,'item_frame','frame_uuid');
    }

    public function linkProductCategory(){
        return $this->hasOne(ProductCategory::class,'category_uuid','frame_category');
    }

    public function linkProductCollection(){
        return $this->hasOne(ProductCollection::class,'collection_uuid','frame_collection');
    }

    public function linkDimension(){
        return $this->hasOne(ProductDimension::class,'dimension_uuid','frame_dimension');
    }

    public function linkShape(){
        return $this->hasOne(ProductShape::class,'shape_uuid','frame_shape');
    }

    public function linkImage(){
        return $this->hasOne(Media::class, 'media_model_id','frame_uuid')->where('media_model', 'Frame');
    }


}
