<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
     use HasFactory;
    protected $table = 'product_collection';

    protected $primaryKey = 'collection_id';
    protected $hidden = ['collection_id'];
}
