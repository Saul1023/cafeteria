<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario para crear un producto.
     */
    public function create()
    {
        $categorias = Categoria::where('estado', 1)->get();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:productos,nombre',
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'estado' => 'required|boolean',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Mostrar un producto específico.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('estado', 1)->get();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Actualizar un producto existente.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:productos,nombre,' . $producto->id,
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'estado' => 'required|boolean',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
