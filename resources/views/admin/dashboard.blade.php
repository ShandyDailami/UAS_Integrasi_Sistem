@extends('app')
@section('content')
    <nav class="navbar py-3 navbar-expand-lg navbar-light" style="background-color: #ED9455">
        <div class="container-fluid">
            <p class="navbar-brand m-0 p-0 fs-4"><b>Dashboard</b></p>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
                <button class="btn btn-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <a class="btn btn-success" href="{{ route('admin/create') }}">Tambah</a>
        </div>
    </nav>
    <table class="table container text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <img style="width: 100px; height: 102px" src="{{ asset($product->image) }}" alt="">
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('admin.delete', $product->product_id) }}" method="POST">
                            <a href="{{ route('admin/edit', $product->id) }}" class="btn btn-sm btn-primary"><i
                                    class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
