<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $products = Product::all();
        $carts = Cart::with('customer', 'product')->get();

        return view('cart.view', compact('customers', 'products', 'carts'));
    }

    public function adminAddToCart(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('customer_id', $request->customer_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {

            $cartItem->quantity += $request->quantity;
            $cartItem->save();
            return redirect()->route('cart.index')->with('success', 'Quantity updated in cart!');
        } else {

            $cartItem = Cart::create([
                'customer_id' => $request->customer_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('cart.index')->with('success', 'Product added to cart!');
        }
    }





    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('product_id', $request->product_id)
            ->where('customer_id', auth()->id())
            ->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $request->quantity]);
            return response()->json(['message' => 'Cart updated successfully']);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }

    public function removeFromCart(Cart $cart)
    {

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    // Test



}
