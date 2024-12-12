<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->select('*')->get();

        return view('customers.customers', compact('customers'));
    }

    public function create()
    {
        return view('customers.customer-add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|url',
        ]);

        $product = Customer::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'image' => $validatedData['image'] ?? null,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.customer-edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|url'
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'image' => $request->image,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');

    }
}
