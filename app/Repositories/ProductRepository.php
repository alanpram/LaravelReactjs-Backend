<?php

namespace App\Repositories;

use App\Models\Fabric\FabricCategory;
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

        $item = [];
 
        foreach ($product as $key => $value) {

            $group = $value->linkFrame->frame_code;
            
            $item[$group] = [
                'flagship' => $value->linkFrame->linkProductItem->where('item_flagships',true)->sortByDesc('product_price')->first(),
                'price' => $value->linkFrame->linkProductItem->sortBy('product_price')->first(),
            ];

        }

        return $item;
    }

    public function getProductByCategory($category){

        $product = ProductFrame::where('frame_status',1)->where('frame_flagship',1)
        ->with(['linkProductCategory','linkProductCollection','linkProductItem.linkImage','linkProductItem.linkPrice'])
        ->whereHas('linkProductCategory',function($q) use($category){
            $q->where('category_slug',$category);
        })
        ->join('product_collection','product_frame.frame_collection','=','product_collection.collection_uuid')
        ->orderBy('collection_name')
        ->get();

        $item = [];

        foreach ($product as $key => $value) {

            $group = $value->frame_code;
            
            $item[$group] = [
                'flagship' => $value->linkProductItem->where('item_flagships',true)->sortByDesc('product_price')->first(),
                'price' => $value->linkProductItem->sortBy('product_price')->first(),
                'length' => $value->frame_length ? $value->frame_length : 0,
                'height' => $value->frame_height ? $value->frame_height : 0 ,
                'diameter' => $value->frame_diameter ?  $value->frame_diameter : 0
            ];
        }

        return $item;
    }

    public function getAllProductVariantByFrame($frame){

        $product = ProductItem::where('item_frame', $frame)
            ->where('item_status', 1)
            ->whereHas('linkFabric', function ($q) {
                $q->where('item_status', 1);
            })
            ->with(['linkImage', 'linkPrice', 'linkFabric.linkImage','linkFabric.linkFabricCategory'])
            ->get();

        $item = [];

        
        foreach ($product as $value) {
            $fabricCategory = $value->linkFabric->linkFabricCategory->category_name;

            $item[$fabricCategory][] = $value;
        }
        
        return $item;
    }

    public function getProductVariantByFrame($frame){

        $product = ProductItem::where('item_frame', $frame)
            ->where('item_status', 1)
            ->whereHas('linkFabric', function ($q) {
                $q->where('item_status', 1);
            })
            ->with(['linkImage', 'linkPrice', 'linkFabric.linkImage','linkFabric.linkFabricCategory'])
            ->get();

        $item = [];

        
        foreach ($product as $value) {
            $fabricCategory = $value->linkFabric->linkFabricCategory->category_name;

            $item[$fabricCategory] = $value;
        }
        
        return $item;
    }

    public function getProductDetail($slug){
        
        $product = ProductItem::where('item_slug',$slug)
        ->with(['linkFrame.linkDimension','linkImage','linkPrice','linkFabric.linkImage'])
        ->first();

        return $product;
    }

    public function getAlternativePhoto($framecode){
        
        $product = ProductItem::where('item_flagships',1)->whereHas('linkFrame',function($q) use($framecode){
            $q->where('frame_code',$framecode);
        })
        ->with('linkImage')
        ->first();

        return $product;
    }

    public function getProductWithSameCollection($collection,$frame){

        $product = ProductFrame::where('frame_status',1)
        ->where('frame_uuid','!=',$frame)
        ->where('frame_collection',$collection)
        ->with(['linkProductCategory','linkProductCollection','linkProductItem.linkImage','linkProductItem.linkPrice'])
        ->join('product_collection','product_frame.frame_collection','=','product_collection.collection_uuid')
        ->orderBy('collection_name')
        ->get();
        
        $item = [];

        foreach ($product as $key => $value) {

            $group = $value->frame_code;
            
            $item[$group] = [
                'flagship' => $value->linkProductItem->where('item_flagships',true)->sortByDesc('product_price')->first(),
                'price' => $value->linkProductItem->sortBy('product_price')->first()
            ];
        }

        return $item;

    }

    public function filter($seaters, $shapes, $category){

        $frame = ProductFrame::where('frame_status', 1)
        ->with(['linkProductCategory','linkProductCollection','linkProductItem.linkImage','linkProductItem.linkPrice'])
        ->whereHas('linkProductCategory',function($q)use($category){
            $q->where('category_name','LIKE','%'.$category.'%');
        })
        ->join('product_collection','product_frame.frame_collection','=','product_collection.collection_uuid')
        ->orderBy('collection_name');
        
        if(!empty($seaters)){
           $frame = $frame->whereHas('linkProductItem', function ($q) use ($seaters) {
                $q->where('item_name','zzz');
                foreach ($seaters as $seater) {
                    $q->orwhere('item_name', 'LIKE', '%' . $seater . '%');
                }
            }); 
        }

        if(!empty($shapes)) {
            $frame = $frame->whereHas('linkShape',function($q) use ($shapes){
                $q->where('shape_code','zzz');
                foreach ($shapes as $shape) {
                    $q->orwhere('shape_code','LIKE','%'.$shape.'%');
                }
            });
        }

        $frame = $frame->get();

        $item = [];

        foreach ($frame as $key => $value) {

            $group = $value->frame_code;
            
            $item[$group] = [
                'flagship' => $value->linkProductItem->where('item_flagships',true)->sortByDesc('product_price')->first(),
                'price' => $value->linkProductItem->sortBy('product_price')->first(),
                'length' => $value->frame_length ? $value->frame_length : 0,
                'height' => $value->frame_height ? $value->frame_height : 0 ,
                'diameter' => $value->frame_diameter ?  $value->frame_diameter : 0
            ];
        }
    
        return $item;

    }
}
