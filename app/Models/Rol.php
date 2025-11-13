<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rols';  // Nombre de la tabla
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    // Relaciones
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol');
    }
}
