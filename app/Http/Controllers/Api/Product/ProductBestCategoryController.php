<?php

namespace App\Http\Controllers\Api\Product;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductBestCategoryController extends Controller
{
    private $productCategoryRepo;

    public function __construct()
    {
        $this->productCategoryRepo = new ProductCategoryRepository();
    }

    public function index(){

        $product = $this->productCategoryRepo->getBestCategory();

        return Response::res('top product',200,$product);
    }
}
