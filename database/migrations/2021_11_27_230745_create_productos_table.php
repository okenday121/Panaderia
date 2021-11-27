<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
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
            $table->string('nombre');
            $table->integer('precio');

            $table->unsignedBigInteger('tipo_producto_id');
            $table->foreign('tipo_producto_id')
                    ->references('id')->on('tipo_productos')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('ingrediente_id');
            $table->foreign('ingrediente_id')
                    ->references('id')->on('ingredientes')
                    ->onDelete('cascade');                    

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
        Schema::dropIfExists('productos');
    }
}
