<?php

namespace App\Http\Controllers\Api\Product;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductTopController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index(){

        $product = $this->productRepo->plugin_GetByModel('Product/Top');

        return Response::res('top product',200,$product);
    }
}
