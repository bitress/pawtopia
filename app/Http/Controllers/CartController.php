<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::with('product')->get();
        
        return view('cart.view', compact('carts'));
    }
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::updateOrCreate(
            ['product_id' => $request->product_id, 'customer_id' => $request->customer_id],
            ['quantity' => $request->quantity]
        );

        return response()->json(['message' => 'Product added to cart', 'data' => $cartItem], 200);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $cartItem = Cart::where('product_id', $request->product_id)
            ->where('customer_id', $request->customer_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Product removed from cart'], 200);
        }

        return response()->json(['message' => 'Product not found in cart'], 404);
    }

    public function viewCart(Request $request, $customer_id)
    {
        $cartItems = Cart::where('customer_id', $customer_id)->get();

        return response()->json(['data' => $cartItems], 200);
    }

    public function viewAllCart()
    {
        $cart = Cart::with('product')->get();
        return response()->json(['data' => $cart]);
    }

}
