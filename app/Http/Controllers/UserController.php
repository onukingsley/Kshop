<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('authentication.signup');
    }

    public function store(Request $request){
        $formrequest = $request->validate([
                'name'=> 'required',
                'email'=> ['required',Rule::unique('users','email')],
                'phone' => 'required',
                'address' => 'required',
                'password' => ['required', 'min:5']
            ]);
        $formrequest['password'] = bcrypt($formrequest['password']);

        $user = User::create($formrequest);

        //login user
        auth()->login($user);

        return redirect('/')->with('message','you have logged in successfully');
    }

    //user login form
    public function login(){
        return view('authentication.login');
    }
    //user login authentication
    public function authenticate(Request $request){
        $formrequest = $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);
        if (auth()->attempt($formrequest)){
            $request->session()->regenerate();
            if (auth()->user()->usertype == 1){
                return redirect('/admin');
            }
            return redirect('/')->with('message', 'login successful!');
        }
        else{
            return back()->withErrors(['email' => 'invalid user credentials'])->onlyInput();
        }
    }
    // logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

    public function showProduct(Product $product){
        $image = ProductImage::where('product_id', '=', $product->id);
        return view('user.singledetail',[
            'product' => $product,
            'prod_img' => $image,
            'carts' => Cart::where('user_id', '=', auth()->id())->get()
            ]);
    }
    public function storeCart (Product $product,Request $request){
        $formrequest = $request->validate([
            'quantity'=> 'required'
        ]);

        $formrequest['name'] = auth()->user()->name;
        $formrequest['email'] = auth()->user()->email;
        $formrequest['phone_no'] = auth()->user()->phone;
        $formrequest['address'] = auth()->user()->address;
        $formrequest['user_id'] = auth()->id();
        $formrequest['product_title'] =$product->title ;
        if ($product->discount_price =! null){
            $formrequest['price'] = $product->discount_price * $formrequest['quantity'];
        }else{
            $formrequest['price'] = $product->price * $formrequest['quantity'];
        }

        $formrequest['image'] = $product->image;
        $formrequest['product_id'] = $product->id;
        $formrequest['shop_id'] = $product->shop->id;

        Cart::create($formrequest);
        return back()->with('message','Added to cart successfully');
    }

    public function showCart(){
        $totalprice = 0;
        $carts = Cart::where('user_id', '=', auth()->id())->get();
        foreach ($carts as $cart){
            $totalprice = $cart->price + $totalprice;
        }
        return view('user.cart',[
            'carts'=> $carts,
            'totalprice' => $totalprice

        ]);
    }
    public function createOrder(){
        $carts = Cart::where('user_id', '=', auth()->id())->get();
        foreach ($carts as $cart){
            $productrequest = [];
            $productrequest['name'] = auth()->user()->name;
            $productrequest['email'] = auth()->user()->email;
            $productrequest['phone_no'] = auth()->user()->phone;
            $productrequest['address'] = auth()->user()->address;
            $productrequest['product_title'] = $cart->product_title;
            $productrequest['price'] = $cart->price;
            $productrequest['quantity'] = $cart->quantity;  
            $productrequest['image'] = $cart->image;
            $productrequest['payment_status'] = 'cash on delivery';
            $productrequest['delivery_status'] = 'processing';
            $productrequest['user_id'] = auth()->id();
            $productrequest['product_id'] = $cart->product->id;
            $productrequest['shop_id'] = $cart->shop->id;

            Order::create($productrequest);
            $c = Cart::find($cart->id);
            $c->delete();
        }
        return back()->with('message','Order successful we will get back to you shortly');
    }

}
