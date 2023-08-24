@extends('authentication.auth-layout')

@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Start creating the best possible user experience for you customers.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/users" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control form-control-lg" type="text" name="name"  value="{{old('name')}}" />
                                            @error('name')
                                            <p> {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"  value="{{old('email')}}"/>
                                            @error('email')
                                            <p> {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">phone</label>
                                            <input class="form-control form-control-lg" type="text" name="phone"  value="{{old('phone')}}"/>
                                            @error('phone')
                                            <p> {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">address</label>
                                            <textarea class="form-control form-control-lg" type="text" name="address"> value="{{old('address')}}"</textarea>
                                            @error('address')
                                            <p> {{$message}}</p>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" />
                                            @error('password')
                                            <p> {{$message}}</p>
                                            @enderror
                                        </div>
                                        <a href="/login" class="text-primary inline ">already have an account?</a>
                                        <div class="text-center mt-3 inline">
{{--                                            <a href="index.html" class="btn btn-lg btn-primary">Sign up</a>--}}

                                            <button type="submit" class="btn btn-lg btn-primary ">Sign up</button>

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
