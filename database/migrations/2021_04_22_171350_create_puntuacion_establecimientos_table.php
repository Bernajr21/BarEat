<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntuacionEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuacion_establecimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id');
            $table->foreignId('producto_id');
            $table->integer('puntuacion_establecimiento');
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
        Schema::dropIfExists('puntuacion_establecimientos');
    }
}
