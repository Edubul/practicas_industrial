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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('producto_id'); 
            $table->unsignedBigInteger('encargado_id'); 
            $table->unsignedBigInteger('profesor_id'); 
            $table->datetime('hora_pedido'); 
            $table->datetime('hora_entrega'); 
            $table->string('aula'); 
            $table->enum('status',['Entregado','Prestado'])->default('Prestado'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
