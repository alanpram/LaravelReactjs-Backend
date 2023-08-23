<?php

namespace App\Http\Controllers\Api\Product;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

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

    
}
