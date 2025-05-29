<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->text('descripcion');
            $table->string('area');
            $table->timestamp('fecha_registro')->nullable();
            $table->timestamp('fecha_cierre')->nullable();
            $table->enum('estado', ['Solicitud', 'Aprobado', 'Rechazado'])->default('Solicitud');
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('usuarioExt')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
