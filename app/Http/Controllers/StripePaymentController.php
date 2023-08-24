<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($totalprice)
    {
        return view('user.cardpayment',[
            'carts' => Cart::where('user_id', '=', auth()->id()),
            'totalprice' => $totalprice
        ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);
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
            $productrequest['payment_status'] = 'paid';
            $productrequest['delivery_status'] = 'processing';
            $productrequest['user_id'] = auth()->id();
            $productrequest['product_id'] = $cart->product->id;
            $productrequest['shop_id'] = $cart->shop->id;

            Order::create($productrequest);
            $c = Cart::find($cart->id);
            $c->delete();

        }
        return back()->with('message','Payment Successful');
    }

}
