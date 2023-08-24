<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['shop_name','user_id','suspended','description','address','email','phone_no','logo'];

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function order(){
        return $this->hasMany(Order::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class,'cart_id');
    }


}

