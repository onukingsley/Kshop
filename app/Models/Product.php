<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','price','category_id','description','quantity','image','discount_price','shop_id'];
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    //relationship to category
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    //relationship to productimage
    public function productimage(){
        return $this->hasMany(ProductImage::class,'productimage_id');
    }

    //relationship to order
    public function order(){
        return $this->hasMany(Order::class,'order_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class,'cart_id');
    }

}
