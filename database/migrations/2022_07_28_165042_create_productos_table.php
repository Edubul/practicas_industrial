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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->longText('nombre_producto')->nullable(false);
            $table->float('precio_venta')->unsigned()->default(0)->nullable(true);
            $table->float('impuesto')->unsigned()->default(0)->nullable(true);
            $table->unsignedBigInteger('categoria_id')->nullable(false);
            $table->string('referencia_interna')->default('')->nullable(true);
            $table->string('nomenclatura')->nullable(false);
            $table->integer('unidades')->unsigned()->default(1);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_productos');
    }
};
