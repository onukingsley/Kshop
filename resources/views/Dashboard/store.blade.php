@extends('Dashboard.layout')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between pe-6" >
                <h1 class="h3 mb-3"><strong>Store</strong> Management</h1>

            </div>

            <div class="w-100">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="card flex-fill">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Shops</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>User id</th>
                                    <th>Usertype</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Suspension status</th>
                                    <th class="d-none d-xl-table-cell">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{$num = 1}}
                                @foreach($shops as $shop)
                                    <tr>
                                        <td>{{$num}}</td>
                                        <td>{{$shop->shop_name}}</td>
                                        <td>{{$shop->user ? $shop->user->id : 'null' }}</td>
                                        <td>{{$shop->user->usertype}}</td>
                                        <td>{{$shop->phone}}</td>
                                        <td>{{$shop->email}}</td>
                                        <td>{{$shop->suspended}}</td>
                                        <td class="d-flex">
                                            <form  method="post" action="/deleteshop/{{$shop->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" class="btn btn-danger me-2">Delete</button>

                                            </form>
                                            @if($shop->suspended == 0)
                                                <form  method="post" action="/shopsuspension/{{$shop->id}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button  type="submit" class="btn btn-warning me-2">Unsuspended</button>

                                                </form>
                                            @else
                                                <form  method="post" action="/shopunsuspension/{{$shop->id}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button  type="submit" class="btn btn-danger me-2">Suspended</button>

                                                </form>
                                            @endif



                                            {{--<form method="post" action="/updatecategory/{{$product->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success">Edit</button>

                                            </form>--}}
                                        </td>

                                        {{$num++}}

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
