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
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('ocupantes');
            $table->string('estatus')->comment('activa,inactiva,ocupada');
            $table->unsignedInteger('sucursales_id');
            $table->string('nombre');
            $table->foreign('sucursales_id')->references('id')->on('sucursales');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
