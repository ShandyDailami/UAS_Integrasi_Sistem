@extends('app')
@section('content')
    <nav class="navbar py-3 navbar-expand-lg navbar-light" style="background-color: #ED9455">
        <div class="container-fluid">
            <a class="navbar-brand m-0 p-0 fs-4" href="#"><b>Logo</b></a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
                <button class="btn btn-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="#">Beranda</a>
                <a class="nav-link active" href="#">Produk</a>
                <a class="nav-link" href="#">Kontak</a>
            </div>
            <a style="text-decoration: none" href="{{ route('logout') }}">
                <div class="d-flex align-items-center gap-2 px-4">
                    @auth
                        <img style="width: 40px" class="rounded-circle" src="{{ asset(Auth::user()->image) }}" alt="">
                        <p class="mb-0 text-dark">{{ Auth::user()->name }}</p>
                    @endauth
                </div>
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img style="width: 70%;" src="{{ asset($product->image) }}" class="card-img-top d-block mx-auto"
                        alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Ulasan</h5>
                        <p class="card-text">Belum ada ulasan untuk produk ini.</p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('payment', ['id' => $product->product_id]) }}" class="btn"
                            style="background-color: #ED9455">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
