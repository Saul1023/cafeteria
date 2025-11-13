<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'total', 'estado'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_venta');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVentas::class, 'id_venta');
    }
}
