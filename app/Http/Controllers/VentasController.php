<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Ventas::with('detalleVentas', 'pedidos')->get();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'total' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        Ventas::create($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ventas $venta)
    {
        $venta->load('detalleVentas', 'pedidos');
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ventas $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ventas $venta)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'total' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ventas $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta eliminada correctamente.');
    }
}
