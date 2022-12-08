<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Categoria[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Categoria::all();

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
            "descripcion"       => "required"
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $category = new Categoria();
        $category->fill($request->all());
        $category->save();

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objCategory = Categoria::find($id);
        if ($objCategory == null) {
            return response()->json("No Existe Esa Categoria");
        }
        return response()->json($objCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $objCategory = Categoria::find($id);
        if ($objCategory == null) {
            return response()->json("No Existe esa categoria");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "descripcion"       => "required",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objCategory->fill($request->all());
        $objCategory->save();

        return response()->json($objCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $objCategory = Categoria::find($id);
            if ($objCategory == null) {
                return response()->json("no existe esa categoria para matarlo");
            }
            $objCategory->delete();

            return response()->json("se elimino esa categoria");

        }
    }
}
