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
        Schema::create('promocions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('tipo_descuento')->nullable();
            $table->decimal('valor_descuento', 10, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('estado')->default(true);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocions');
    }
};
