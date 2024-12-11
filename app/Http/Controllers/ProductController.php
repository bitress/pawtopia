<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $products = DB::table('products')->select('*')->get();

        return view('products.products', compact('products'));
    }

    public function create()
    {
        return view('products.product-add');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_image' => 'nullable|url'
        ]);

        $product = Product::findOrFail($id);

            $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'product_image' => $request->product_image,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_image' => 'nullable|url',
        ]);

        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'product_image' => $validatedData['product_image'] ?? null,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }

}
