<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();

            $table->string('ruta_imagen');
            $table->text('descripcion_imagen');
            $table->double('ancho');
            $table->double('alto');
            $table->foreignId('establecimiento_id')->constrained('establecimientos');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('anuncio_id')->constrained('anuncios');
            $table->foreignId('user_id')->constrained('users');
            
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
        Schema::dropIfExists('imagenes');
    }
}
