@extends('Dashboard.layout')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Add category</h1>
                            <p class="lead">
                                Add a category for a collection of items
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/storecategory" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control form-control-lg" type="text" name="category_name"  value="{{old('name')}}" />
                                            @error('name')
                                            <p> {{'Name of the category is requried'}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category_image</label>
                                            <input class="form-control form-control-lg" type="file" name="category_image"  value="{{old('email')}}"/>
                                        </div>
                                        <div class="text-center mt-3 inline">
                                            <button type="submit" class="btn btn-lg btn-primary ">Add category</button>

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
