<?php

namespace App\Http\Controllers\Api\Banner;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $bannerRepo;

    public function __construct()
    {
        $this->bannerRepo = new BannerRepository;
    }
    public function index(){

        $banner = $this->bannerRepo->getBanner();

        return Response::res('data banner',200,$banner);
    }
}
