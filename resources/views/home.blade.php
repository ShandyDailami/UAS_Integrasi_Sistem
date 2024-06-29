@extends('app')
@section('content')
    @auth
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
                        <img style="width: 40px" class="rounded-circle" src="{{ asset(Auth::user()->image) }}" alt="">
                        <p class="mb-0 text-dark">{{ Auth::user()->name }}</p>
                    </div>
                </a>
            </div>
        </nav>
        <div class="row">
            <div style="height: 100vh; background: #d9d9d9" class="col-3 px-5 pt-4">
                <p class="fs-5 m-0"><b>Lokasi</b></p>
                <form action="">
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="banjarmasin">
                        <label class="form-check-label" for="banjarmasin">Banjarmasin</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="banjarbaru">
                        <label class="form-check-label" for="banjarbaru">Banjarbaru</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="martapura">
                        <label class="form-check-label" for="martapura">Martapura</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Tapin</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Kandangan</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Barabai</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Amuntai</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Balangan</label>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Tabalong</label>
                    </div>
                    <hr class="w-100">

                    <p class="fs-5 mb-1"><b>Harga</b></p>
                    <div class="mb-2">
                        <input type="text" class="form-control" placeholder="Rp 100.000">
                    </div>
                    <input type="text" class="form-control" placeholder="Maksimal">
                </form>
            </div>
            <div class="col-9 px-0" style="background: #eee">
                <div class="row row-cols-1 row-cols-md-5 g-4 p-2">
                    @foreach ($products as $product)
                        <div class="col">
                            <a style="text-decoration: none" href="{{ route('detail', ['id' => $product->product_id]) }}"
                                class="card" style="transition: .3s">
                                <img style="width: 100%; height: 172px" src="{{ asset($product->image) }}"
                                    class="card-img-top text-center" alt="...">
                                <div class="card-body">
                                    <h5 style="font-size: 16px" class="card-title text-black">{{ $product->name }}</h5>
                                    <p style="color: #ED9455" class="card-text">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endauth
@endsection
