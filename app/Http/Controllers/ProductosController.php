<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Productos[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Productos::all();

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
            "precio"       => "required|numeric",
            "categoria_id"       => "required|numeric",
            "receta_id"       => "required|numeric",

        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $producto = new Productos();
        $producto->fill($request->all());
        $producto->save();

        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objProducto = Productos::find($id);
        if ($objProducto == null) {
            return response()->json("No Existe Ese Producto");
        }
        return response()->json($objProducto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $objProducto = Productos::find($id);
        if ($objProducto == null) {
            return response()->json("No Existe ese roducto");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "fecha_vencimiento"       => "required",
            "precio"       => "required|numeric",
            "stock_id"       => "required|numeric",
            "categoria_id"       => "required|numeric",
            "receta_id"       => "required|numeric",

        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objProducto->fill($request->all());
        $objProducto->save();

        return response()->json($objProducto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $objProducto = Productos::find($id);
            if ($objProducto == null) {
                return response()->json("no existe ese producto para matarlo");
            }
            $objProducto->delete();

            return response()->json("se elimino el producto");

        }
    }
}
