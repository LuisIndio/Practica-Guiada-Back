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
            $table->string("nombre");
            $table->integer("precio");

            $table->bigInteger("categoria_id")->unsigned();
            $table->foreign("categoria_id")
                ->references("id")
                ->on("categorias")
                ->onDelete("cascade");

            $table->bigInteger("receta_id")->unsigned();
            $table->foreign("receta_id")
                ->references("id")
                ->on("recetas")
                ->onDelete("cascade");
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
