<?php

namespace App\Models\Fabric;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricCategory extends Model
{
    use HasFactory;

    protected $table = 'fabric_category';

    protected $primaryKey = 'category_id';
    protected $hidden = ['category_id'];

    public function linkFabric(){
        return $this->hasMany(FabricItem::class,'item_category','category_uuid');
    }
}
