@extends('app')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif
    <nav class="navbar py-3 navbar-expand-lg navbar-light mb-5" style="background-color: #ED9455">
        <div class="container-fluid">
            <p class="navbar-brand m-0 p-0 fs-4"><b>Tambah</b></p>
        </div>
    </nav>
    <form action="{{ route('admin/store') }}" class="container" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row px-2">
            <div class="input-group mb-3">
                <label class="input-group-text" for="category">Options</label>
                <select class="form-select" id="category" name="category_id">
                    <option selected disabled>Choose...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nama barang">
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description"
                    style="height: 100px"></textarea>
                <label class="px-4" for="description">Deskripsi</label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <input type="text" name="price" class="form-control"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <input type="text" name="stock" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        class="form-control" placeholder="Stok">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
@endsection
