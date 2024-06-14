<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.list_products', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create_product');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo producto
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.product_details', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un producto
    }

    public function destroy($id)
    {
        // Lógica para eliminar un producto
    }
}

