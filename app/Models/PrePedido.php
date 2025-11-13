<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrePedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_reservacion', 'id_producto', 'cantidad', 'precio_unitario', 'subtotal', 'estado'];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'id_reservacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
