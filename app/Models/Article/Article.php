<?php

namespace App\Models\Article;

use App\Models\Plugin\MetaPlugin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'article_id';
    protected $hidden = ['article_id'];

    public function linkImage(){
        return $this->hasOne(ArticleMedia::class,'media_article_id','article_uuid');
    }
    public function linkCategory(){
        return $this->hasOne(ArticleCategory::class,'category_id','article_category_uuid');
    }
    public function linkMeta(){
        return $this->hasOne(MetaPlugin::class,'meta_model_id','article_id')->where('meta_model','meta/article');
    }
    public function linkUser(){
        return $this->hasOne(User::class,'id','article_writer');
    }
}
