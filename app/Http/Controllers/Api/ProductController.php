<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;


//! CONTROLADOR DE LOS PRODUCTOS

class ProductController extends Controller
{

    //!LISTA TODO LOS PRODUCTOS
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    //? INSERTA LOS PRODUCTOS
    public function store(StoreProductRequest $request)
    {
        $products = new Product($request->validated()); 

        $image = $request->file('img');
        if ($image) {

            $nombreImagen = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/product'), $nombreImagen);

            $url = asset('img/product/' . $nombreImagen);
            $products->img = $url;
        }

        $products->save();

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
        $product->id_category = $request->id_category;
        $product->nombrePro = $request->nombrePro;
        $product->codigoPro = $request->codigoPro;
        $product->descripPro = $request->descripPro;
        $product->precioPro = $request->precioPro;
        $product->stockPro = $request->stockPro;
        $product->status = $request->status;
        $product->save();
        return response()->json(['message' => 'Update', 'data' => $product]);
    }
    //! ELIMINA LOS PRODUCTOS
   
    public function destroy(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->status = $request->status;
            $product->save();
            return response()->json(['message' => 'Update', 'data' => $product]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
