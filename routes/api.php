<?php

/*use App\Http\Controllers\Api\V1\ProductController;*/

use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ShopController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1','middleware'=>'auth:sanctum'], function(){
   Route::apiResource('products', ProductController::class);
   Route::apiResource('users',UserController::class);
   Route::apiResource('shops', ShopController::class);
});
Route::post('v1/authenticate',[UserController::class, 'authenticate']);
Route::get('v1/logout',[UserController::class, 'logout']);
Route::get('v1/getuser',[UserController::class, 'getuser']);
/*Route::controller(\App\Http\Controllers\Api\V1\ProductController::class)->group(function (){
   Route::get('Api/v1/products', 'index');
});*/
