<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ShopCollection;
use App\Http\Resources\V1\ShopResource;
use App\Models\Shop;
use App\Services\V1\ShopQuery;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = new ShopQuery();
        $queryItems = $query->transform($request);


        $user = $request->query('user');

        $shop = Shop::where($queryItems);
        if ($user){
            $shop = $shop->with('user');
        }
        return new ShopCollection($shop->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop, Request $request)
    {
        $includes = \request('user');

        if ($includes){
            return new ShopResource($shop->loadMissing('user'));
        }
        return new ShopResource($shop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
