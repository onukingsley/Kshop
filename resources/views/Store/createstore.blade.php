@extends('Dashboard.newlayout')

@section('content')

    @include('Dashboard.topnav')
    @if(session('message'))
        <div class="alert alert-success">
            <p>{{session('message')}}</p>
        </div>
    @endif
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Create Store</h1>
                            {{-- <p class="lead">
                                 Add a product that is to be sold
                             </p>--}}
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/storeshop" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Store Name</label>
                                            <input class="form-control form-control-lg" type="text" name="shop_name"  value="{{old('shop_name')}}" />
                                            @error('shop_name')
                                            <p> Title field is required</p>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control form-control-lg"  name="email"  value="{{old('email')}}" />
                                                @error('email')
                                                <p> Price field is required</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control form-control-lg" name="phone_no"  value="{{old('phone')}}" />
                                                @error('phone')
                                                <p> Price field is required</p>
                                                @enderror
                                            </div>
                                        </div>





                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input class="form-control form-control-lg" type="text" name="address"  value="{{old('address')}}" />
                                                @error('address')
                                                <p> Quantity field is required</p>
                                                @enderror
                                            </div>



                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control form-control-lg" type="text" name="description">{{old('description')}}</textarea>
                                            @error('description')
                                            <p> {{$message}}</p>
                                            @enderror

                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Store logo</label>
                                                <input class="form-control form-control-lg " type="file" name="logo"  value="{{old('logo')}}"/>
                                        </div>
                                        <div class="text-center mt-3 inline">
                                            <button class="btn btn-lg btn-primary ">Create Store</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
