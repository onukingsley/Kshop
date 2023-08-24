@extends('Dashboard.layout')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between pe-6" >
                <h1 class="h3 mb-3"><strong>Admin</strong> Category</h1>
                <a href="/addproduct"><span class="btn btn-success mb-1">Add Product</span></a>

            </div>

            <div class="w-100">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="card flex-fill">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Latest Projects</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Product Image</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="d-none d-xl-table-cell">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->title}}</td>

                                        <td class="col-5"><img style="width: 15%; height: 15%" src="{{asset('storage/'.$product->image)}}" alt="lasdflaf"></td>

                                        <td>{{$product->category->category_name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td class="d-flex">
                                            <form  method="post" action="/deletecategory/{{$product->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" class="btn btn-danger me-2">Delete</button>

                                            </form>
                                            {{--<form method="post" action="/updatecategory/{{$product->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success">Edit</button>

                                            </form>--}}
                                            <a class="btn btn-success" href="/editproduct">edit</a>
                                        </td>



                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
