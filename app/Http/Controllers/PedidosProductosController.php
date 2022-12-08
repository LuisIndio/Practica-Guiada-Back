<?php

namespace App\Http\Controllers;

use App\Models\PedidosProductos;
use Illuminate\Http\Request;

class PedidosProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PedidosProductos[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return PedidosProductos::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "pedido_id"         => "required|numeric",
            "producto_id"       => "required|numeric",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $pedido_producto = new PedidosProductos();
        $pedido_producto->fill($request->all());
        $pedido_producto->save();

        return response()->json($pedido_producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidosProductos  $pedidosProductos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objPedido_producto = PedidosProductos::find($id);
        if ($objPedido_producto == null) {
            return response()->json("No Existe Ese Pedido Producto");
        }
        return response()->json($objPedido_producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidosProductos  $pedidosProductos
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidosProductos $pedidosProductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedidosProductos  $pedidosProductos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $objPedido_producto = PedidosProductos::find($id);
        if ($objPedido_producto == null) {
            return response()->json("No Existe ese pedido producto");
        }
        $validated = $request->validate([
            "pedido_id"         => "required|numeric",
            "producto_id"       => "required|numeric",

        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objPedido_producto->fill($request->all());
        $objPedido_producto->save();

        return response()->json($objPedido_producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidosProductos  $pedidosProductos
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
            $objPedido_producto = PedidosProductos::find($id);
            if ($objPedido_producto == null) {
                return response()->json("no existe ese pedido producto para matarlo");
            }
            $objPedido_producto->delete();

            return response()->json("se elimino el pedido producto");
    }
}
