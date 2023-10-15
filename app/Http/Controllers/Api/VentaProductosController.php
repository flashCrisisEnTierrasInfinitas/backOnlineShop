<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VentaProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaProductosController extends Controller
{

    public function index($id)
    {
        try {
            $data = DB::table('products')
                ->select('id','nombrePro','codigoPro','precio','cantidad','img')
                ->join('venta_productos', 'products.id', '=', 'venta_productos.producto_id')
                ->where('venta_productos.venta_id','=',$id)
                ->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
