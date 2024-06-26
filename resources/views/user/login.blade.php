@extends('app')
@section('content')
    <div class="row m-0 align-items-center justify-content-end">
        <div class="col-5 px-5">
            <h1 class="text-center">Welcome Back</h1>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form class="" action="{{ route('login.action') }}" method="POST">
                <a href="{{ route('redirect') }}" class="my-3 py-2 btn btn-outline-dark w-100">
                    <img style="width: 20px" src="{{ URL('images/google icon.png') }}" alt="">
                    Log in with Google
                </a>
                <div class="d-flex justify-content-center my-2">
                    <hr class="w-25">
                    <p class="pt-1 mx-4 text-sm-center font-weight-bold text-secondary">OR LOGIN WITH EMAIL</p>
                    <hr class="w-25">
                </div>
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="username" name="name" placeholder="Username"
                        value="{{ old('name') }}" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div>
                <div class="mb-3 d-flex flex-column justify-content-end">
                    <a class="mb-3" style="color: #ED9455" href="{{ route('password') }}">Forgot password?</a>
                    <button class="btn btn-light w-100 text-light py-2" style="background-color: #ED9455">Login</button>
                </div>
            </form>
            <p class="text-center text-secondary">
                Don't have an account?
                <a style="color: #ED9455" href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
        <div class="col-6 p-0 d-flex justify-content-end">
            <img class="" style="width: 450px" src="{{ URL('images/aside.png') }}" alt="">
        </div>
    </div>
@endsection
