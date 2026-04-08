<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $dataStore = [
            'store_name' => 'toko elektronik',
            'address'    => 'Surabaya, jawa timur',
            'type'       => 'Ruko'
        ];
        
        $data = Product::with('category')->get(); 
        return view('pages.products.show', compact('data', 'dataStore'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.products.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id); 
        $categories = Category::all();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}