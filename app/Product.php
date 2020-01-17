<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = [
        'prod_name', 'description', 'image_path', 'price', 'status', 
        'created_at', 'updated_at'
    ];
}
