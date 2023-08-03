<?php

namespace App\Repositories;

use App\Models\Product\ProductItem;
use App\Models\Product\ProductPlugin;

class ProductRepository{

    public function plugin_GetByModel($model){

        $product = ProductPlugin::all();

        return $product;
    }
}
