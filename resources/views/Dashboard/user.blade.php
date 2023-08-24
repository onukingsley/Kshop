@extends('Dashboard.layout')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between pe-6" >
                <h1 class="h3 mb-3"><strong>User</strong> Management</h1>

         </div>

            <div class="w-100">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="card flex-fill">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Users</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>name</th>
                                    <th>shop id</th>
                                    <th>usertype</th>
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>suspension status</th>
                                    <th class="d-none d-xl-table-cell">Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$num}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->shop ? $user->shop->id : 'null' }}</td>
                                        <td>{{$user->usertype}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->suspended}}</td>
                                        <td class="d-flex">
                                            <form  method="post" action="/deleteuser/{{$user->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" class="btn btn-danger me-2">Delete</button>

                                            </form>
                                            @if($user->suspended == 0)
                                            <form  method="post" action="/suspension/{{$user->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button  type="submit" class="btn btn-warning me-2">Unsuspended</button>

                                            </form>
                                            @else
                                                <form  method="post" action="/unsuspension/{{$user->id}}">
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
