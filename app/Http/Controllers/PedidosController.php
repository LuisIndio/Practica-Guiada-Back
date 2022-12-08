<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Pedidos[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Pedidos::with('pedidosproductos','cliente')->get();

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
            "nombre"         => "required",
            "direccion"       => "required",
            "cliente_id"       => "required|numeric",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $pedido = new Pedidos();
        $pedido->fill($request->all());
        $pedido->save();
        $producto = new Productos();
        $producto = Productos::find($request->producto);
        $pedido->pedidosproductos()->attach($producto->id);

        return response()->json($pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objPedido = Pedidos::find($id);
        if ($objPedido == null) {
            return response()->json("No Existe Ese pedido");
        }
        return response()->json($objPedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $objPedido = Pedidos::find($id);
        if ($objPedido == null) {
            return response()->json("No Existe ese pedido");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "direccion"       => "required",
            "cliente_id"       => "required|numeric",


        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objPedido->fill($request->all());
        $objPedido->save();

        return response()->json($objPedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $objPedido = Pedidos::find($id);
            if ($objPedido == null) {
                return response()->json("no existe ese pedido para matarlo");
            }
            $objPedido->delete();

            return response()->json("se elimino el pedido");

        }
    }
}
