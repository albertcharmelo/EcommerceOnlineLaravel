<?php

use App\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'codigo' => '0001',
            'nombre' => 'Protector de Pantalla',
            'descripcion' => 'Ninguna',
            'estado' => 1,
            'imagen' => 'www///',
        ]);
        DB::table('categorias')->insert([
            'codigo' => '0002',
            'nombre' => 'Accesorios para móviles',
            'descripcion' => 'Ninguna',
            'estado' => 1,
            'imagen' => 'www///',
        ]);

        // for ($i = 2; $i <= 50; $i++) {
        //     Categoria::create([
        //         'codigo' => '01',
        //         'nombre' => 'Protector de Pantalla',
        //         'descripcion' => 'Ninguna',
        //         'estado' => 1,
        //         'imagen' => 'www///',
        //     ]);

        // }
    }
}
