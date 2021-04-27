<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre_establecimiento', 100);
            $table->text('descripcion_establecimiento');
            $table->string('dirección_establecimiento');
            $table->double('latitud', 8, 2);
            $table->double('longitud', 8, 2);
            $table->string('tipo_establecimiento', 100);
            $table->integer('nif');
            $table->integer('maximo_numero_comensales');
            $table->integer('aforo');
            $table->string('ruta_foto_principal');
            $table->integer('puntuacion_media_establecimiento');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('es_premium');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('establecimientos');
    }
}
