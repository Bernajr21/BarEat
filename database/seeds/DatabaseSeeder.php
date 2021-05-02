<?php

use App\User;
use App\TipoUsuario;
use App\UsuarioTipo;
use App\Establecimiento;
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
        // queremos que los datos sustituyan a los anteriores, borra los datos
        User::truncate();
        //TipoUsuario::truncate();
        UsuarioTipo::truncate();
        
        $cantidad = 100;
        $cantEstabl = 25;

        factory(User::class,$cantidad)->create();
        factory(UsuarioTipo::class,$cantidad)->create();
        factory(Establecimiento::class,$cantEstabl)->create();

        Schema::enableForeignKeyConstraints();       
    }
}
