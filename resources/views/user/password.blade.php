@extends('app')
@section('content')
    <div class="row m-0 align-items-center justify-content-end">
        <div class="col-5 px-5">
            <h1 class="text-center">Forgot Password</h1>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('password.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="password" name="old_password" placeholder="Password" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="new_password" placeholder="New Password" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="new_password_confirmation"
                        placeholder="New Password Confirmation" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary w-100 px-2">Change</button>
                </div>
            </form>
        </div>
        <div class="col-6 p-0 d-flex justify-content-end">
            <img class="" style="width: 450px" src="{{ URL('images/aside.png') }}" alt="">
        </div>
    </div>
@endsection
