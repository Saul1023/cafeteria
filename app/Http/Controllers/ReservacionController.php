<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Reservacion;
use App\Models\User;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    /**
     * Mostrar todas las reservaciones.
     */
    public function index()
    {
        $reservaciones = Reservacion::with(['mesa', 'user'])->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    /**
     * Mostrar formulario para crear una nueva reservación.
     */
    public function create()
    {
        $mesas = Mesa::all();
        $usuarios = User::all();
        return view('reservaciones.create', compact('mesas', 'usuarios'));
    }

    /**
     * Guardar una nueva reservación.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mesa' => 'required|exists:mesas,id',
            'id_users' => 'required|exists:users,id',
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'nullable|string|max:20',
            'email_cliente' => 'nullable|email|max:255',
            'fecha_reservacion' => 'required|date',
            'hora_reservacion' => 'required',
            'numero_personas' => 'required|integer|min:1',
            'estado' => 'required|boolean',
            'observaciones' => 'nullable|string|max:500',
        ]);

        Reservacion::create($request->all());

        return redirect()->route('reservaciones.index')->with('success', 'Reservación creada correctamente.');
    }

    /**
     * Mostrar una reservación específica.
     */
    public function show(Reservacion $reservacion)
    {
        $reservacion->load(['mesa', 'user', 'prePedidos']);
        return view('reservaciones.show', compact('reservacion'));
    }

    /**
     * Mostrar formulario para editar una reservación.
     */
    public function edit(Reservacion $reservacion)
    {
        $mesas = Mesa::all();
        $usuarios = User::all();
        return view('reservaciones.edit', compact('reservacion', 'mesas', 'usuarios'));
    }

    /**
     * Actualizar una reservación existente.
     */
    public function update(Request $request, Reservacion $reservacion)
    {
        $request->validate([
            'id_mesa' => 'required|exists:mesas,id',
            'id_users' => 'required|exists:users,id',
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'nullable|string|max:20',
            'email_cliente' => 'nullable|email|max:255',
            'fecha_reservacion' => 'required|date',
            'hora_reservacion' => 'required',
            'numero_personas' => 'required|integer|min:1',
            'estado' => 'required|boolean',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $reservacion->update($request->all());

        return redirect()->route('reservaciones.index')->with('success', 'Reservación actualizada correctamente.');
    }

    /**
     * Eliminar una reservación.
     */
    public function destroy(Reservacion $reservacion)
    {
        $reservacion->delete();
        return redirect()->route('reservaciones.index')->with('success', 'Reservación eliminada correctamente.');
    }
}
