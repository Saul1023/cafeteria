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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users');
            $table->foreignId('id_cliente')->nullable()->constrained('users'); // cliente opcional
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('monto_pago', 10, 2)->nullable();
            $table->decimal('monto_cambio', 10, 2)->nullable();
            $table->string('tipo_pago')->default('efectivo'); // efectivo, tarjeta, etc.
            $table->timestamp('fecha_venta')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
