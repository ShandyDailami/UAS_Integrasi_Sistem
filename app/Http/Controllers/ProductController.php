<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data['title'] = 'Home';

        return view('home', compact('products'), $data);
    }

    public function showData()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('admin/dashboard', compact('products', 'categories'));
    }
    public function detail($id)
    {
        $data['title'] = 'Detail';
        $product = Product::find($id);

        return view('detail', compact('product'), $data);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin/create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->hasFile('image');
        $image = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $imagePath = 'storage/images/' . $imageName;

        $product = new Product([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);
        $product->save();

        return redirect()->back()->with(['success' => 'Product has been created']);
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin/edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'storage/images/' . $imageName;

            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $product->image = $imagePath;
        }
        $product->fill($request->post())->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product has been update');
    }

    public function destroy(Product $product)
    {
        Storage::delete('storage/images/' . $product->image);
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Produk has been deleted');
    }
}
