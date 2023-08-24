<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\V1\UserQuery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter= new UserQuery();
        $queryitems = $filter->transform($request);

        $includesshop = $request['shop'];
        $user = User::where($queryitems);
        if ($includesshop){
           $user =  $user->with('shop');
        }
        return new UserCollection($user->paginate()->appends($request->query()));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $formrequest = $request->all();
        $formrequest['password'] = password_hash($formrequest['password'],PASSWORD_BCRYPT);
        $user = User::create($formrequest);
        auth()->login($user);

        return new UserResource($user);
    }

    public function authenticate(Request $request)
    {
        $formrequest = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);
        if (auth()->attempt($formrequest)){

            $user = Auth::user();
            $request->session()->regenerate();
            $admintoken = $user->createToken('admin-token',['create','update','delete']);
            $updatetoken = $user->createToken('update-token',['create','update']);
            $basictoken = $user->createToken('basic-token',['none']);

            return $user.'login successful';
        }


        return new UserResource(auth()->user());
    }
    public function logout(){
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return 'LogOut successful';
    }
    public function getuser(){

        return \auth()->user()? auth()->user() : 'no user found';
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (\request('shop')){
            return new UserResource($user->loadMissing('shop'));
        }
        return new UserResource($user);
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
