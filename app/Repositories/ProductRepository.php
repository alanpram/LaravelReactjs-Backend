<?php

namespace App\Repositories;

use App\Models\Product\ProductFrame;
use App\Models\Product\ProductItem;
use App\Models\Product\ProductPlugin;

class ProductRepository{

    public function plugin_GetByModel($model){
        
        $product =  ProductPlugin::where('product_model',$model)
        ->where('product_status',true)
        ->with('linkFrame.linkProductItem.linkImage')
        ->with('linkFrame.linkProductItem.linkPrice')
        ->get();
 
        foreach ($product as $key => $value) {

            $group = $value->linkFrame->frame_code;
            
            $item[$group] = [
                'flagship' => $value->linkFrame->linkProductItem->where('item_flagships',true)->sortByDesc('product_price')->first(),
                'price' => $value->linkFrame->linkProductItem->sortBy('product_price')->first(),
            ];

        }

        return $item;
    }
}
