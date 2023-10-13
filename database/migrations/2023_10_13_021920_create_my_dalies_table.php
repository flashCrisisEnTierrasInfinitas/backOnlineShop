<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('my_dalies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->unsigned();
            $table->string('Ven_usuario');
            $table->string('Com_usuario');
            $table->string('Dire_envio');
            $table->integer('Numero_telefono');
            $table->string('Total_Pagos');
            $table->string('TypeService');
            $table->integer('Codigo_ven');
            $table->integer('Codigo_pro');
            $table->integer('status');
            $table->string('img');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_dalies');
    }
};
