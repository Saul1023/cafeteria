<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'promocion_productos', 'promocion_id', 'producto_id');
    }
}
