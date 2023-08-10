<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository{

    public function getBanner($model){

        $banner = Banner::where('banner_campaign',$model)
        ->where('banner_status',true)
        ->with('linkImage')
        ->first();

        return $banner;
    }

    public function getAllBanner($model){

        $banner = Banner::where('banner_campaign',$model)
        ->where('banner_status',true)
        ->with('linkImage')
        ->get();

        return $banner;
    }
}
