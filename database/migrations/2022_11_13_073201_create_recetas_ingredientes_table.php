<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("recetas_id")->unsigned();
            $table->foreign("recetas_id")
                ->references("id")
                ->on("recetas")
                ->onDelete("cascade");

            $table->bigInteger("ingredientes_id")->unsigned();
            $table->foreign("ingredientes_id")
                ->references("id")
                ->on("ingredientes")
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
        Schema::dropIfExists('recetas_ingredientes');
    }
}
