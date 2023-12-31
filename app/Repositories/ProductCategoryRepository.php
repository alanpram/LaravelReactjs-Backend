<?php

namespace App\Repositories;

use App\Models\Product\ProductCategory;

class ProductCategoryRepository{

    public function getBestCategory(){

        $category = ProductCategory::where('category_status',1)->where('category_show',1)->with('linkImage')->whereHas('linkImage')->get();

        return $category;
    }

    public function getCategoryBySlug($slug){

        $category = ProductCategory::where('category_status',1)->where('category_slug',$slug)->first();

        return $category;
    }
}