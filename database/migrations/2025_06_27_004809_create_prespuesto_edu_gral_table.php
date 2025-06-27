<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrespuestoEduGralTable extends Migration
{
    public function up(): void
    {
        Schema::create('prespuesto_edu_gral', function (Blueprint $table) {
            $table->id();
            $table->string('unidad_ejecutora', 255);
            $table->string('concepto', 255);
            $table->integer('ano');
            $table->decimal('presupuesto_vigente', 15, 2)->default(0);
            $table->decimal('devengado', 15, 2)->default(0);
            $table->decimal('pagado', 15, 2)->default(0);
            $table->date('fecha_pago')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prespuesto_edu_gral');
    }
}