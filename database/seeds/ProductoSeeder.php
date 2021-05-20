<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \App\Producto::truncate();
        \App\Producto::create(['tipo_producto' => 'bebida',]);
        \App\Producto::create(['tipo_producto' => 'tapa',]);
        \App\Producto::create(['tipo_producto' => 'ración',]);
        \App\Producto::create(['tipo_producto' => 'plato',]);
        \App\Producto::create(['tipo_producto' => 'postre',]);

        Schema::enableForeignKeyConstraints();
    }
}
