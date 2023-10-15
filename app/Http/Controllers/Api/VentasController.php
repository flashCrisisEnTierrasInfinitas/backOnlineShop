<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVentasRequest;
use App\Models\Product;
use App\Models\VentaProductos;
use App\Models\Ventas as ModelVentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index()
    {
        $Ventas = ModelVentas::all();
        return response()->json($Ventas);
    }
    public function store(StoreVentasRequest $request)
    {

        DB::beginTransaction();

        try {
            $ventas = ModelVentas::create($request->validated());

            $image = $request->file('img');
            if ($image) {

                $nombreImagen = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/product'), $nombreImagen);

                $url = asset('img/product/' . $nombreImagen);
                $ventas->img = $url;
            }

            $total_venta = 0;
            foreach ($request->productos as  $value) {
                $producto = Product::find($value['id']);
                $total_venta += $producto->precioPro * $value['cantidad'];
                VentaProductos::create([
                    'venta_id' => $ventas->id,
                    'producto_id' => $producto->id,
                    'cantidad' => $value['cantidad'],
                    'precio' => $producto->precioPro
                ]);
                $producto->stockPro -= $value['cantidad'];
                $producto->save();
            }
            $ventas->Total_Pago = $total_venta;
            $ventas->save();

            DB::commit();
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try {
            $ventas = ModelVentas::find($id);
            $ventas->status_venta = $request->status_venta;
            $ventas->save();
            return response()->json(['message' => 'Update', 'data' => $ventas]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function destroy($id)
    {
        //
    }
}