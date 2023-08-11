<?php

namespace App\Models\Plugin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $table = 'plugin_metas';

    protected $primaryKey = 'meta_id';
    protected $hidden = ['meta_id'];
    
}
