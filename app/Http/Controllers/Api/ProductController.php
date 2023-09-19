<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

//! CONTROLADOR DE LOS PRODUCTOS

class ProductController extends Controller
{
    //!LISTA TODO LOS PRODUCTOS
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }
    //? INSERTA LOS PRODUCTOS
    public function store(Request $request)
    {
        $product = new Product();
        $product->nombrePro = $request->nombrePro;
        $product->codigoPro = $request->codigoPro;
        $product->tipoPro = $request->tipoPro;
        $product->descripPro = $request->descripPro;
        $product->precioPro = $request->precioPro;
        $product->stockPro = $request->stockPro;

        $product->save();

        return response()->json(['message' => 'success']);
    }
    //* LISTA UNO POR UNO
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }
    //TODO: ACTUALIZA LOS PRODUCTOS
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->nombrePro = $request->nombrePro;
        $product->codigoPro = $request->codigoPro;
        $product->descripPro = $request->descripPro;
        $product->precioPro = $request->precioPro;
        $product->stockPro = $request->stockPro;

        $product->save();
        return response()->json(['message' => 'Update','data'=>$product]);
    }
    //! ELIMINA LOS PRODUCTOS
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return response()->json(['message' => 'Delete','data' => $product]);
    }
}
