<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

//! CONTROLADOR DE LOS PRODUCTOS

class ProductController extends Controller
{
  
    public function index()
    {
        $product = Product::all();
        return $product;
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->nombrePro = $request->nombrePro;
        $product->codigoPro = $request->codigoPro;
        $product->descripPro = $request->descripPro;
        $product->precioPro = $request->precioPro;
        $product->stockPro = $request->stockPro;

        $product->save();
    }

    public function show($id)
    {
        $product = Product::fid($id);
        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($request->$id);
        $product->nombrePro = $request->nombrePro;
        $product->codigoPro = $request->codigoPro;
        $product->descripPro = $request->descripPro;
        $product->precioPro = $request->precioPro;
        $product->stockPro = $request->stockPro;

        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::destroy($id);
        return $product;
    }
}
