<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\V1\ProductQuery;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProductQuery();
        $queryItems = $filter->transform($request);

        $category = $request->query('category');
        $products = Product::where($queryItems);

        if ($category){

            $products = $products->with('category');
        }
        return new ProductCollection($products->paginate()->appends($request->query()));


        /*$products = Product::all();
        return new ProductCollection($products);*/
    }


    /**
     *  Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
       return new ProductResource( Product::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
