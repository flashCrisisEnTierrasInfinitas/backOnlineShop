<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_category')->unsigned();
            $table->string('nombrePro');
            $table->string('codigoPro');
            $table->string('descripPro');
            $table->double('precioPro');
            $table->integer('stockPro');
            $table->string('img');
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('category_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
