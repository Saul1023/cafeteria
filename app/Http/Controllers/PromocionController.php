<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
        /**
     * Mostrar todas las promociones.
     */
    public function index()
    {
        $promociones = Promocion::with('productos')->get();
        return view('promociones.index', compact('promociones'));
    }

    /**
     * Mostrar formulario para crear una nueva promoción.
     */
    public function create()
    {
        $productos = Producto::all();
        return view('promociones.create', compact('productos'));
    }

    /**
     * Guardar una nueva promoción.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:promocions,nombre',
            'descripcion' => 'nullable|string|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|boolean',
            'productos' => 'nullable|array',
            'productos.*' => 'exists:productos,id',
        ]);

        $promocion = Promocion::create($request->only('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'));

        if ($request->has('productos')) {
            $promocion->productos()->sync($request->productos);
        }

        return redirect()->route('promociones.index')->with('success', 'Promoción creada correctamente.');
    }

    /**
     * Mostrar una promoción específica.
     */
    public function show(Promocion $promocion)
    {
        $promocion->load('productos');
        return view('promociones.show', compact('promocion'));
    }

    /**
     * Mostrar formulario para editar una promoción.
     */
    public function edit(Promocion $promocion)
    {
        $productos = Producto::all();
        $promocion->load('productos');
        return view('promociones.edit', compact('promocion', 'productos'));
    }

    /**
     * Actualizar una promoción existente.
     */
    public function update(Request $request, Promocion $promocion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:promocions,nombre,' . $promocion->id,
            'descripcion' => 'nullable|string|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|boolean',
            'productos' => 'nullable|array',
            'productos.*' => 'exists:productos,id',
        ]);

        $promocion->update($request->only('nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'));

        if ($request->has('productos')) {
            $promocion->productos()->sync($request->productos);
        } else {
            $promocion->productos()->detach();
        }

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada correctamente.');
    }

    /**
     * Eliminar una promoción.
     */
    public function destroy(Promocion $promocion)
    {
        $promocion->productos()->detach();
        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada correctamente.');
    }
}
