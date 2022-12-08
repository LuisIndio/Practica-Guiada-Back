<?php

namespace App\Http\Controllers;

use App\Models\Recetas;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Recetas::all();

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
            "descripcion"       => "required",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $receta = new Recetas();
        $receta->fill($request->all());
        $receta->save();

        return response()->json($receta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objReceta = Recetas::find($id);
        if ($objReceta == null) {
            return response()->json("No Existe Esa Receta");
        }
        return response()->json($objReceta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\Response
     */
    public function edit(Recetas $recetas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $objReceta = Recetas::find($id);
        if ($objReceta == null) {
            return response()->json("No Existe esa Receta");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "descripcion"       => "required",

        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objReceta->fill($request->all());
        $objReceta->save();

        return response()->json($objReceta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objReceta = Recetas::find($id);
        if ($objReceta == null) {
            return response()->json("no existe esa Receta para matarlo");
        }
        $objReceta->delete();

        return response()->json("se elimino la Receta");

    }
}
