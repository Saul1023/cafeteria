<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_venta', 'id_pre_pedido', 'cantidad', 'subtotal', 'estado'];

    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'id_venta');
    }

    public function prePedido()
    {
        return $this->belongsTo(PrePedido::class, 'id_pre_pedido');
    }
}
