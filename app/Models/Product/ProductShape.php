<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShape extends Model
{
    use HasFactory;
    protected $table = 'product_shape';

    protected $primaryKey = 'shape_id';
    protected $hidden = 'shape_id';
}
