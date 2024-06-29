@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <!-- Informasi produk lainnya -->

                <!-- Tombol untuk melakukan pembayaran -->
                <form action="{{ route('payment.pay') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <button type="submit" class="btn btn-primary">Bayar dengan Midtrans</button>
                </form>
            </div>
        </div>
    </div>
@endsection
