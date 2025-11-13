<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->constrained('productos');
            $table->integer('cantidad'); // positivo = ingreso, negativo = salida
            $table->string('tipo_movimiento'); // ingreso, venta, ajuste
            $table->text('descripcion')->nullable();
            $table->foreignId('id_usuario')->constrained('users'); // quién hizo el movimiento
            $table->timestamp('fecha_movimiento')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
