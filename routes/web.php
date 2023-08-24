<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\UserGuests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware(UserGuests::class);

// user login
Route::get('/login', [Usercontroller::class, 'login'])->name('login');
Route::post('/authenticate', [Usercontroller::class, 'authenticate']);

//user registration
Route::get('/register', [Usercontroller::class, 'create']);
Route::post('/users', [Usercontroller::class, 'store']);

//user logout
Route::post('/logout', [UserController::class, 'logout']);

//user single detail page
Route::get('/productdetail/{product}',[UserController::class, 'showProduct']);
//user add to cart
Route::post('product/{product}/addtocart',[UserController::class, 'storeCart'])->middleware(\App\Http\Middleware\Authenticate::class);
//user cartpage
Route::get('/cart',[UserController::class,'showCart']);
Route::delete('/cart/{cart_id}/delete',[UserController::class,'destroyCart']);

//user order
Route::post('/checkout',[UserController::class, 'createOrder']);


//user dashboard category
Route::get('/admin', [AdminController::class, 'index'])->middleware(AdminAuthentication::class);
Route::get('/category', [AdminController::class, 'showCategory']);
Route::get('/addcategory', [AdminController::class, 'createCategory']);
Route::post('/storecategory', [AdminController::class, 'storeCategory']);
Route::delete('/deletecategory/{categoryid}', [AdminController::class, 'destroyCategory']);

//user dashboard product
Route::get('/addproduct', [AdminController::class, 'createProduct']);
Route::post('/storeproduct', [AdminController::class, 'storeProduct']);
Route::get('/products', [AdminController::class, 'showProduct']);

//user dashboard usermanagement
Route::get('usermanagement',[AdminController::class,'showUser']);
Route::delete('deleteuser/{user}',[AdminController::class,'destroyUser']);
Route::put('/suspension/{user}',[AdminController::class,'suspendUser']);
Route::put('/unsuspension/{user}',[AdminController::class,'unsuspendUser']);

//shop dashboard management
Route::get('shopmanagement',[AdminController::class, 'showShop']);
Route::delete('deleteshop/{shop}',[AdminController::class,'destroyShop']);
Route::put('/shopsuspension/{shop}',[AdminController::class,'suspendshop']);
Route::put('/shopunsuspension/{shop}',[AdminController::class,'unsuspendshop']);


//store management
Route::get('/createstore',[StoreController::class,'create']);
Route::post('/storeshop',[StoreController::class,'store',]);


//stripe payment
Route::get('stripe/{totalprice}', [\App\Http\Controllers\StripePaymentController::class,'stripe']);
Route::post('stripe/{totalprice}', [\App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');
