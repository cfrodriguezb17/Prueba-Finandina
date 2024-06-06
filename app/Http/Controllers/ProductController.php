<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show()
    {
        return inertia('Views/Tienda');
    }

    public function index()
    {
        $products = Product::all();
        return Inertia::render('Views/Tienda', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|integer',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
