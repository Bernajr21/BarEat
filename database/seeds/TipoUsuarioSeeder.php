<?php

use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \App\TipoUsuario::truncate();
        \App\TipoUsuario::create(['tipo' => 'cliente',]);
        \App\TipoUsuario::create(['tipo' => 'propietario',]);

        Schema::enableForeignKeyConstraints();
    }
}
