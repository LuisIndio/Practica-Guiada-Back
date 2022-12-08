<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pedido_id")->unsigned();
            $table->foreign("pedido_id")
                ->references("id")
                ->on("pedidos")
                ->onDelete("cascade");

            $table->bigInteger("producto_id")->unsigned();
            $table->foreign("producto_id")
                ->references("id")
                ->on("productos")
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
