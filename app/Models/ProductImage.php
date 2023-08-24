<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','prod_1','prod_2','prod_3','prod_4','prod_5'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
