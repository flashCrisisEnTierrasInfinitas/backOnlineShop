<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('user_venta');
            $table->string('user_compra');
            $table->string('direccion');
            $table->integer('user_telefono');
            $table->integer('tipo_servicio');
            $table->integer('Total_Pago')->default(0);
            $table->integer('status_venta')->default(0);
            $table->string('img');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
