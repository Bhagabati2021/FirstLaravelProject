<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        return view("products.index", compact("products"));
    }
    public function create()
    {
        return view("products.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "details" => "required",
        ]);
        Product::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),

        ]);
        return redirect()->route('products.index')->with('success', 'product created successfully');
    }
    public function show(Product $product)
    {

        return view('products.show', compact('product'));
    }
    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {

        $request->validate([
            "name" => "required",
            "details" => "required",
        ]);

        $product->update([
            "name" => $request->input("name"),
            "details" => $request->input("details"),
        ]);
        return redirect()->route('products.index')->with('success', 'product updated successfully');
    }
    public function destroy(Request $request, Product $product)
    {

        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully');
    }
}
