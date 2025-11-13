<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromocionProducto extends Model
{
    use HasFactory;

    protected $table = 'promocion_productos';

    protected $fillable = ['promocion_id', 'producto_id'];
}
