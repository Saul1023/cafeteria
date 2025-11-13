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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesa_id')->nullable()->constrained('mesas');
            $table->foreignId('id_usuario')->constrained('users');
            $table->foreignId('id_reservacion')->nullable()->constrained('reservacions');
            $table->foreignId('id_venta')->nullable()->constrained('ventas');
            $table->string('nombre_cliente')->nullable();
            $table->string('tipo_pedido')->default('local');
            $table->string('estado')->default('pendiente');
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->timestamp('fecha_entrega')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
