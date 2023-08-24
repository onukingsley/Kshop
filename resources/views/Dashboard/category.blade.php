@extends('Dashboard.layout')

@section('content')
    <main class="content">
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between pe-6" >
            <h1 class="h3 mb-3"><strong>Admin</strong> Category</h1>
            <a href="/addcategory"><span class="btn btn-success mb-1">Add category</span></a>

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
                <img class="img-fluid" src="" alt="">
                <th class="d-none d-xl-table-cell">Start Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->category_name}}</td>

                <td class="col-5"><img style="width: 15%; height: 15%" src="{{asset('storage/'.$category->category_image)}}" alt="lasdflaf"></td>
                <td>
                    <form method="post" action="/deletecategory/{{$category->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success">Delete</button>

                    </form>
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
