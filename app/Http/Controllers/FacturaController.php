<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factura[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Factura::all();

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
            "fecha"         => "required",
            "precio_total"       => "required",
            "cliente_id"       => "required|numeric",
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $factura = new Factura();
        $factura->fill($request->all());
        $factura->save();

        return response()->json($factura);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $objFactura = Factura::find($id);
        if ($objFactura == null) {
            return response()->json("No Existe Esa Factura");
        }
        return response()->json($objFactura);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objFactura = Factura::find($id);
        if ($objFactura == null) {
            return response()->json("No Existe esa Factura");
        }
        $validated = $request->validate([
            "fecha"         => "required",
            "precio_total"       => "required",
            "cliente_id"       => "required|numeric",


        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objFactura->fill($request->all());
        $objFactura->save();

        return response()->json($objFactura);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $objFactura = Factura::find($id);
            if ($objFactura == null) {
                return response()->json("no existe esa factura para matarla");
            }
            $objFactura->delete();

            return response()->json("se elimino la factura");

        }
    }
}
