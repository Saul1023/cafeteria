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
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mesa')->constrained('mesas');
            $table->foreignId('id_users')->nullable()->constrained('users');
            $table->string('nombre_cliente');
            $table->string('telefono_cliente');
            $table->string('email_cliente')->nullable();
            $table->date('fecha_reservacion');
            $table->time('hora_reservacion');
            $table->integer('numero_personas');
            $table->string('estado')->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->unique(['id_mesa', 'fecha_reservacion', 'hora_reservacion']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservacions');
    }
};
