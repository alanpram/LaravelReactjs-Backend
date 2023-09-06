<?php

namespace App\Models\Fabric;

use App\Models\Plugin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricItem extends Model
{
    use HasFactory;
    protected $table = 'fabric_item';

    protected $primaryKey = 'item_id';
    protected $hidden = ['item_id'];

    public function linkImage(){
        return $this->hasOne(Media::class, 'media_model_id','item_uuid')->where('media_model', 'Fabric/Item');
    }

    public function linkFabricCategory(){
        return $this->hasOne(FabricCategory::class,'category_uuid','item_category');
    }
}
