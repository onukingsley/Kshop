@extends('Dashboard.layout')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Add Product</h1>
                           {{-- <p class="lead">
                                Add a product that is to be sold
                            </p>--}}
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/storeproduct" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input class="form-control form-control-lg" type="text" name="title"  value="{{old('title')}}" />
                                            @error('title')
                                            <p> Title field is required</p>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <label class="form-label">Price</label>
                                                <input class="form-control form-control-lg" min="0" step=".01" type="number" name="price"  value="{{old('price')}}" />
                                                @error('price')
                                                <p> Price field is required</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Discount Price</label>
                                                <input class="form-control form-control-lg" min="0" step=".01" type="number" name="discount_price"  value="{{old('discount_price')}}" />
                                                @error('price')
                                                <p> Price field is required</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" name="category_id" aria-label="Default select example">
                                                    @foreach($categories as $category)
                                                        <option value={{$category->id}}>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <p> Price field is required</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input class="form-control form-control-lg" type="text" name="quantity"  value="{{old('quantity')}}" />
                                                @error('quantity')
                                                <p> Quantity field is required</p>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control form-control-lg" type="text" name="description">{{old('description')}}</textarea>
                                            @error('description')
                                            <p> {{$message}}</p>
                                            @enderror

                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Product Image</label>
                                            <div class="d-flex flex-row">
                                                <input class="form-control form-control-lg " type="file" name="product_image"  value="{{old('product_image')}}"/>
                                                <input class="form-control form-control-lg" type="file" name="prod_1"  value="{{old('prod_1')}}"/>
                                            </div>
                                            <div class="d-flex">
                                                <input class="form-control form-control-lg" type="file" name="prod_2"  value="{{old('prod_2')}}"/>
                                                <input class="form-control form-control-lg" type="file" name="prod_3"  value="{{old('prod_3')}}"/>
                                            </div>
                                            <div class="d-flex ">
                                                <input class="form-control form-control-lg" type="file" name="prod_4"  value="{{old('prod_4')}}"/>
                                                <input class="form-control form-control-lg" type="file" name="prod_5"  value="{{old('prod_5')}}"/>
                                            </div>

                                        </div>
                                        <div class="text-center mt-3 inline">
                                            <button type="submit" class="btn btn-lg btn-primary ">Add Product</button>

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
