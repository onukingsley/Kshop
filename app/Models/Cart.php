<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone_no','address','product_title','price','quantity','image','user_id','product_id','shop_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
