<?php

namespace App\Http\Controllers;

use App\Models\Ingredientes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Ingredientes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Ingredientes::all();

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
            "calidad"       => "required|numeric",
            "stock_id"       => "required|numeric",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $ingredientes = new Ingredientes();
        $ingredientes->fill($request->all());
        $ingredientes->save();

        return response()->json($ingredientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredientes  $ingredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objIngrediente = Ingredientes::find($id);
        if ($objIngrediente == null) {
            return response()->json("No Existe Ese ingrediente");
        }
        return response()->json($objIngrediente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredientes  $ingredientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredientes $ingredientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredientes  $ingredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objIngrediente = Ingredientes::find($id);
        if ($objIngrediente == null) {
            return response()->json("No Existe ese ingrediente");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "calidad"       => "required|numeric",
            "stock_id"       => "required|numeric",


        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objIngrediente->fill($request->all());
        $objIngrediente->save();

        return response()->json($objIngrediente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredientes  $ingredientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $objIngrediente = Ingredientes::find($id);
            if ($objIngrediente == null) {
                return response()->json("no existe ese ingrediente para matarlo");
            }
            $objIngrediente->delete();

            return response()->json("se elimino el ingrediente");

        }
    }
}
