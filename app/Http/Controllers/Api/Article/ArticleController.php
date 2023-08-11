<?php

namespace App\Http\Controllers\Api\Article;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $ArticleRepo;

    public function __construct()
    {
        $this->ArticleRepo = new ArticleRepository;
    }

    public function index(){

        $article = $this->ArticleRepo->getArticleForHome();

        return Response::res('data article',200,$article);
    }
}
