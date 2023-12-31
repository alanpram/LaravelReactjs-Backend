<?php

namespace App\Models\Product;

use App\Models\Fabric\FabricItem;
use App\Models\Plugin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;
    protected $table = 'product_item';

    protected $primaryKey = 'item_id';
    protected $hidden = ['item_id'];

    public function linkImage(){
        return $this->hasMany(Media::class, 'media_model_id','item_uuid')->where('media_model', 'Product/Item');
    }

    public function linkPrice(){
        return $this->hasOne(ProductPrice::class, 'product_item','item_uuid');
    }

    public function linkFrame()
    {
        return $this->belongsTo(ProductFrame::class, 'item_frame', 'frame_uuid');
    }

    public function linkFabric(){
        return $this->hasOne(FabricItem::class,'item_uuid','item_fabric');
    }
}
