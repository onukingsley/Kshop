<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = Product::latest()->paginate(6);

        return view('index',[
            'products'=>$products
        ]);
    }
}
