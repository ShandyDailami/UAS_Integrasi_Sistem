@extends('app')
@section('content')
    <div class="row m-0 align-items-center justify-content-end">
        <div class="col-5 my-3">
            <h1 class="text-center">Sign Up</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data">
                <a href="{{ route('redirect') }}" class="my-3 py-2 btn btn-outline-dark w-100">
                    <img style="width: 20px" src="{{ URL('images/google icon.png') }}" alt="">
                    Log in with Google
                </a>
                <div class="d-flex justify-content-center my-2">
                    <hr class="w-25">
                    <p class="pt-1 mx-4 text-sm-center font-weight-bold text-secondary">OR SIGN UP WITH EMAIL</p>
                    <hr class="w-25">
                </div>
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                        placeholder="Name" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Email" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="phone" value="{{ old('name') }}"
                        placeholder="Phone" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="address" value="{{ old('name') }}"
                        placeholder="Address" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
                <div class="mb-3">
                    <button class="btn w-100 py-2 text-light" style="background-color: #ED9455">Register</button>
                </div>
                <p class="text-secondary text-center">Have an account?
                    <a style="color: #ED9455" href="{{ route('login') }}">Sign in</a>
                </p>
            </form>
        </div>
        <div class="col-6 p-0 d-flex justify-content-end">
            <img class="" style="width: 480px" src="{{ URL('images/aside.png') }}" alt="">
        </div>
    </div>
@endsection
