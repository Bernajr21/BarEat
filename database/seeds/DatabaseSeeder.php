<?php

use App\User;
use App\Carta;
use App\Imagen;
use App\Reserva;
use App\Producto;
use App\TipoUsuario;
use App\Establecimiento;
use App\PuntuacionEstablecimiento;
use App\PuntuacionProducto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        User::truncate();
        TipoUsuario::truncate();
        Reserva::truncate();
        PuntuacionEstablecimiento::truncate();
        PuntuacionProducto::truncate();
        Producto::truncate();
        Imagen::truncate();
        Establecimiento::truncate();
        Carta::truncate();

        $this->call(TipoUsuarioSeeder::class);

        foreach (range(1, 10) as $i){
            $u = factory(User::class)->create();
            $u->usuarios_tipo()->attach(TipoUsuario::all()->random());
        }


        //factory(Establecimiento::class,4)->create();
        //factory(Reserva::class,20)->create();
        //factory(Carta::class, 4)->create(); //Crear tantas como restaurantes
        //factory(Producto::class,100)->create();
        //factory(PuntuacionEstablecimiento::class,50)->create();
        //factory(PuntuacionProducto::class,50)->create();
        //factory(Imagen::class,200)->create();

        Schema::enableForeignKeyConstraints();       
    }
}
