<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index($id)
    {
        $data['title'] = 'Payment';
        $product = Product::find($id);

        return view('payment', compact('product'), $data);
    }

    public function pay(Request $request)
    {
        $product_id = $request->input('product_id');

        $product = Product::findOrFail($product_id);

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$clientKey = config('midtrans.clientKey');
        \Midtrans\Config::$isProduction = true;

        $transaction_details = [
            'order_id' => 'ORDER-' . time(),
            'gross_amount' => $product->price,
        ];

        $snapToken = Snap::getSnapToken($transaction_details);

        return redirect()->to($snapToken);
    }
}
