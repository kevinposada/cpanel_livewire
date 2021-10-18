<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(16);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->only('title', 'descripcion', 'price')+ [
        'image' => 'products/product-01.jpg']);
        return redirect()->route('products.show', $product->id)->with('success', 'Usuario creado correctamente');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductEditRequest $request, Product $product)
    {
        $data = $request->only('title', 'descripcion', 'price');
        $product->update($data);
        return redirect()->route('products.show', $product->id)->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('succes', 'Producto eliminado correctamente');
    }
}
