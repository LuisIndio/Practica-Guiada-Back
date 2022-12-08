<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Clientes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Clientes::all();

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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nombre"         => "required",
            "apellido"       => "required",
            "dni"            => "required|numeric",
            "telefono"       => "required|numeric",
            "direccion"      => "required",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $client = new Clientes();
        $client->fill($request->all());
        $client->save();

        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objClient = Clientes::find($id);
        if ($objClient == null) {
            return response()->json("No Existe Ese Cliente");
        }
        return response()->json($objClient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $objClient = Clientes::find($id);
        if ($objClient == null) {
            return response()->json("No Existe Ese Cliente");
        }
        $validated = $request->validate([
            "nombre"         => "required",
            "apellido"       => "required",
            "dni"            => "required|numeric",
            "telefono"       => "required|numeric",
            "direccion"      => "required",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objClient->fill($request->all());
        $objClient->save();

        return response()->json($objClient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        {
            $objClient = Clientes::find($id);
            if ($objClient == null) {
                return response()->json("no existe ese cliente para matarlo");
            }
            $objClient->delete();

            return response()->json("se elimino el cliente");

        }
    }
}
