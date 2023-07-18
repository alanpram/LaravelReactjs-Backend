<?php

namespace App\Models;

use App\Models\Plugin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'plugin_banner';

    protected $primaryKey = 'banner_id';
    protected $hidden = ['banner_id'];


    public function linkStore(){
        return $this->belongsTo(Store::class, 'banner_store');
    }

    public function linkImage(){
        return $this->hasOne(Media::class, 'media_model_id','banner_uuid')->where('media_model', 'Plugin/Banner')->where('media_status',true);
    }
}
