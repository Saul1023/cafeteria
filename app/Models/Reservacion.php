<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mesa', 'id_users', 'nombre_cliente', 'telefono_cliente', 'email_cliente',
        'fecha_reservacion', 'hora_reservacion', 'numero_personas', 'estado', 'observaciones'
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'id_mesa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function prePedidos()
    {
        return $this->hasMany(PrePedido::class, 'id_reservacion');
    }
}
