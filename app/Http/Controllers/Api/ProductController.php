<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    
    public function store(Request $request)
    {
        $product = new Product();
        $product->description = $request-> description;
        $product->price = $request-> price;
        $product->stock = $request-> stock;

        $product->save(); //metodo para guardar
    }

   
    public function show(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($request->id); //capturar datos por el id
        
        $product->description = $request-> description;
        $product->price = $request-> price;
        $product->stock = $request-> stock;

        $product->save(); //metodo para guardar
        return $product;
    }

   
    public function destroy(string $id)
    {
        $product = Product::destroy($id); //eliminar datos pasandole el id
        return $product;
    }
}
