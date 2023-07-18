<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository{

    public function getBanner(){

        $banner = Banner::where('banner_status',true)->with('linkImage')->get();

        return $banner;
    }
}
