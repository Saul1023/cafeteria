<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Mostrar todas las mesas.
     */
    public function index()
    {
        $mesas = Mesa::with('reservaciones')->get();
        return view('mesas.index', compact('mesas'));
    }

    /**
     * Mostrar formulario para crear una nueva mesa.
     */
    public function create()
    {
        return view('mesas.create');
    }

    /**
     * Guardar una nueva mesa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:10|unique:mesas,numero',
            'estado' => 'required|boolean',
        ]);

        Mesa::create($request->all());

        return redirect()->route('mesas.index')->with('success', 'Mesa creada correctamente.');
    }

    /**
     * Mostrar una mesa específica.
     */
    public function show(Mesa $mesa)
    {
        $mesa->load('reservaciones');
        return view('mesas.show', compact('mesa'));
    }

    /**
     * Mostrar formulario para editar una mesa.
     */
    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', compact('mesa'));
    }

    /**
     * Actualizar una mesa existente.
     */
    public function update(Request $request, Mesa $mesa)
    {
        $request->validate([
            'numero' => 'required|string|max:10|unique:mesas,numero,' . $mesa->id,
            'estado' => 'required|boolean',
        ]);

        $mesa->update($request->all());

        return redirect()->route('mesas.index')->with('success', 'Mesa actualizada correctamente.');
    }

    /**
     * Eliminar una mesa.
     */
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();
        return redirect()->route('mesas.index')->with('success', 'Mesa eliminada correctamente.');
    }
}
