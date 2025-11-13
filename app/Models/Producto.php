<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'id_categoria', 'estado'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function prePedidos()
    {
        return $this->hasMany(PrePedido::class, 'id_producto');
    }

    public function promocions()
    {
        return $this->belongsToMany(Promocion::class, 'promocion_productos', 'producto_id', 'promocion_id');
    }
}
