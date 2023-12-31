<?php

namespace App\Http\Controllers\Api\Product;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductFrame;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Throwable;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    private $ProductRepo;
    private $ProductCategoryRepo;

    public function __construct()
    {
        $this->ProductRepo = new ProductRepository;
        $this->ProductCategoryRepo = new ProductCategoryRepository;
    }

    public function index($category){

        $data = $this->ProductRepo->getProductByCategory($category);

        $category = $this->ProductCategoryRepo->getCategoryBySlug($category);

        $message = [
            'message' => 'data product list',
            'category' => $category->category_name,
            'category_description' => $category->category_description
        ];

        return Response::res($message,200,$data);
    }

    public function show($slug){

        $data = $this->ProductRepo->getProductDetail($slug);

        $variant = $this->ProductRepo->getProductVariantByframe($data->linkFrame->frame_uuid);

        $collection = $this->ProductRepo->getProductWithSameCollection($data->linkFrame->frame_collection, $data->linkFrame->frame_uuid);
        
        $category = $data->linkFrame->linkProductCollection->collection_name;

        if($data->linkImage->isNotEmpty()){

            $alternative_img = 'null';

        }else{

            $alternative_img = $this->ProductRepo->GetAlternativePhoto($data->linkFrame->frame_code);

        }

        $data = [
                'data' => $data,
                'variant' => $variant,
                'collection' => $collection,
                'alternative_image' => $alternative_img,
                'frame_image' => $data->linkFrame->linkImage ? $data->linkFrame->linkImage->media_path.'/'.$data->linkFrame->linkImage->media_file : '',
                'category' => $category,
            ];
            
            return Response::res('product detail with alternative image',200,$data);

    
    }

    public function variant($slug){
       
        $product = $this->ProductRepo->getProductDetail($slug);
        
        $data = $this->ProductRepo->getAllProductVariantByframe($product->linkFrame->frame_uuid);

         return Response::res('product variant',200,$data);
    }

    public function filter(Request $request){

        $filters = $request->input('filters');

        $category = $request->input('category');

        $seaters = array_diff($filters, ['Rectangle', 'Round']);

        $shapes = array_intersect($filters, ['Rectangle', 'Round']);

        $data = $this->ProductRepo->filter($seaters,$shapes,$category);
        
        return Response::res('product filter',200,$data);
    }
}
