<?php

namespace App\Http\Controllers;

use App\Models\RecetasIngredientes;
use Illuminate\Http\Request;

class RecetasIngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RecetasIngredientes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return RecetasIngredientes::all();

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
            "receta_id"         => "required|numeric",
            "ingrediente_id"       => "required|numeric",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $receta_ingrediente = new RecetasIngredientes();
        $receta_ingrediente->fill($request->all());
        $receta_ingrediente->save();

        return response()->json($receta_ingrediente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecetasIngredientes  $recetasIngredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objReceta_ingrediente = RecetasIngredientes::find($id);
        if ($objReceta_ingrediente == null) {
            return response()->json("No Existe Ese receta ingrediente");
        }
        return response()->json($objReceta_ingrediente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecetasIngredientes  $recetasIngredientes
     * @return \Illuminate\Http\Response
     */
    public function edit(RecetasIngredientes $recetasIngredientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecetasIngredientes  $recetasIngredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objReceta_ingrediente = RecetasIngredientes::find($id);
        if ($objReceta_ingrediente == null) {
            return response()->json("No Existe esa receta ingrediente");
        }
        $validated = $request->validate([
            "receta_id"         => "required|numeric",
            "ingrediente_id"       => "required|numeric",

        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objReceta_ingrediente->fill($request->all());
        $objReceta_ingrediente->save();

        return response()->json($objReceta_ingrediente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecetasIngredientes  $recetasIngredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objReceta_ingrediente = RecetasIngredientes::find($id);
        if ($objReceta_ingrediente == null) {
            return response()->json("no existe esa receta ingrediente para matarlo");
        }
        $objReceta_ingrediente->delete();

        return response()->json("se elimino la receta ingrediente");
    }
}
