<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDimension extends Model
{
    use HasFactory;
    protected $table = 'product_dimension';

    protected $primaryKey = 'dimension_id';
    protected $hiden = 'dimension_id';
}
