<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    public function create(){
        return view('Store.createstore');
    }

    public function store(Request $request){

        $formrequest = $request->validate([
            'shop_name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
        ]);
        $formrequest['user_id'] = auth()->id();

        if ($request->hasFile('logo')){
            $formrequest['logo'] = $request->file('logo')->store('logos','public');
        }


        Shop::create($formrequest);
        return redirect('/')->with('message','Store created successfully You are a store owner');

    }

}
