<?php
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
            'nombre' => 'Accesorios Para Moviles',
            'descripcion' => 'Ninguna',
            'estado' => 1,
            'imagen' => 'www///',
        ]);
        DB::table('categorias')->insert([
            'id_padre' => 1,
            'codigo' => '0002',
            'nombre' => 'Auriculares',
            'descripcion' => 'Ninguna',
            'estado' => 1,
            'imagen' => 'www///',
        ]);
        DB::table('categorias')->insert([
            'id_padre' => 1,
            'codigo' => '0002',
            'nombre' => 'Cargadores',
            'descripcion' => 'Ninguna',
            'estado' => 1,
            'imagen' => 'www///',
        ]);
    }
}