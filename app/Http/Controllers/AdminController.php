<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Generator\RandomGeneratorFactory;

class AdminController extends Controller
{
    public function index(){
        return view('Dashboard.index');
    }

    public function showCategory(){
        $image = Category::all();
        return view('Dashboard.category',[
            'categories'=> Category::all()
        ]);

    }

    public function createCategory(){
        return view('Dashboard.addcategory');
    }

    public function storeCategory(Request $request){
        $formrequest = $request->validate([
           'category_name' => 'required'

        ]);
        if ($request->hasFile('category_image')){
            $formrequest['category_image'] = $request->file('category_image')->store('category','public');
        }

        Category::create($formrequest);

        return back()->with('message', 'category added successfully');

    }
    //delete category
    public function destroyCategory(Category $categoryid){
        $categoryid->delete();
        return redirect('/category');
    }

    //add product
    public function createProduct(){
        $categories = Category::all();
        return view('Dashboard.addproduct',[
            'categories' => $categories
        ]);
    }
    public function storeProduct(Request $request){
        $formrequest = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $imagerequest = [];
        $formrequest['shop_id'] = auth()->user()->shop->id;
        if ($request->hasFile('product_image')){
            $formrequest['image'] =  $request->file('product_image')->store('product','public');
        }
        if ($request->hasFile('prod_1')){
            $imagerequest['prod_1'] =  $request->file('product_image')->store('product','public');
        }
        if ($request->hasFile('prod_2')){
            $imagerequest['prod_2'] =  $request->file('product_image')->store('product','public');
        }
        if ($request->hasFile('prod_3')){
            $imagerequest['prod_3'] =  $request->file('product_image')->store('product','public');
        }
        if ($request->hasFile('prod_4')){
            $imagerequest['prod_4'] =  $request->file('product_image')->store('product','public');
        }
        if ($request->hasFile('prod_5')){
            $imagerequest['prod_5'] =  $request->file('product_image')->store('product','public');
        }

        //create product and store into a variable
        $prod = Product::create($formrequest);
        $imagerequest['product_id'] = $prod->id;

        //create productImage
        ProductImage::create($imagerequest);

        return redirect('/products')->with('message','product added successfully');
    }

    public function showProduct(){
        $products = Product::all();
        return view('Dashboard.products',[
            'products'=> $products
        ]);
    }

    public function showUser(){
        $num = 1;
        $users = User::where('usertype', '!=', '1')->get();

        return view('Dashboard.user',[
            'users' => $users,
            'num' => $num
        ]);

    }

    public function suspendUser(User $user){
        $userupdate = ['suspended' => 1];
        $user->update($userupdate);
        $shop = Shop::where('user_id', '=', $user->id)->get();
        if ($shop != null){

            $shop['0']->update($userupdate);

        }
        return back()->with('message','user suspended successfully');
    }
    public function unsuspendUser(User $user){
        $userupdate = ['suspended' => 0];
        $user->update($userupdate);

        $shop = Shop::where('user_id', '=', $user->id)->get();
        if ($shop != null){

            $shop['0']->update($userupdate);

        }

        return back()->with('message','user unsuspended successfully');
    }
    public function destroyUser(User $user){
        $user->delete();
        return back()->with('message','user has been removed successfully');
    }




    public function showShop(){
        $num = 1;
        $shops = Shop::all();

        return view('Dashboard.store',[
            'shops' => $shops,
            'num' => $num
        ]);

    }

    public function suspendshop(Shop $shop){
        $shopupdate = ['suspended' => 1];
        $shop->update($shopupdate);

        return back()->with('message','user suspended successfully');
    }
    public function unsuspendshop(Shop $shop){
        $shopupdate = ['suspended' => 0];
        $shop->update($shopupdate);

        return back()->with('message','user unsuspended successfully');
    }
    public function destroyshop(User $shop){
        $shop->delete();
        return back()->with('message','user has been removed successfully');
    }
}
